
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- acl_permissions
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `acl_permissions`;


CREATE TABLE `acl_permissions`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`module` VARCHAR(20),
	`role_id` INTEGER(11),
	`resource` VARCHAR(500),
	`actions` VARCHAR(500),
	`permission` INTEGER(11) default 0,
	PRIMARY KEY (`id`),
	KEY `FK_acl_permissions`(`role_id`),
	CONSTRAINT `FK_acl_permissions`
		FOREIGN KEY (`role_id`)
		REFERENCES `acl_roles` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- acl_roles
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `acl_roles`;


CREATE TABLE `acl_roles`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20)  NOT NULL,
	`parent_role` INTEGER(11),
	`is_front_end` TINYINT(4) default 0,
	PRIMARY KEY (`id`),
	KEY `FK_admins_roles_parent`(`parent_role`),
	CONSTRAINT `FK_admins_roles`
		FOREIGN KEY (`parent_role`)
		REFERENCES `acl_roles` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- admins
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `admins`;


CREATE TABLE `admins`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(20)  NOT NULL,
	`password` VARCHAR(20)  NOT NULL,
	`email` VARCHAR(100)  NOT NULL,
	`role` INTEGER(11),
	PRIMARY KEY (`id`),
	UNIQUE KEY `uniq_admin_email` (`email`),
	KEY `FK_admins_roles`(`role`),
	CONSTRAINT `FK_admins`
		FOREIGN KEY (`role`)
		REFERENCES `acl_roles` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- album
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `album`;


CREATE TABLE `album`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(500)  NOT NULL,
	`description` VARCHAR(500),
	`gallery_id` INTEGER(11)  NOT NULL,
	`cover_photo_id` INTEGER(11),
	`rank` INTEGER(11) default 1,
	`is_public` INTEGER(11) default 0,
	`max_width` INTEGER(11),
	`max_height` INTEGER(11),
	PRIMARY KEY (`id`),
	KEY `FK_album`(`gallery_id`),
	CONSTRAINT `FK_album`
		FOREIGN KEY (`gallery_id`)
		REFERENCES `gallery` (`id`)
		ON UPDATE RESTRICT
		ON DELETE CASCADE
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- events
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `events`;


CREATE TABLE `events`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255),
	`venue` VARCHAR(500),
	`address` TEXT,
	`created` DATETIME,
	`start_date` DATETIME,
	`end_date` DATETIME,
	`image_id` INTEGER(11),
	`is_public` TINYINT(4) default 0,
	`event_type` VARCHAR(255)  NOT NULL,
	`facebook_id` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `fk_live_shows_image`(`image_id`),
	CONSTRAINT `fk_live_shows_image`
		FOREIGN KEY (`image_id`)
		REFERENCES `files` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- files
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `files`;


CREATE TABLE `files`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`filename` VARCHAR(255)  NOT NULL,
	`mimetype` VARCHAR(50),
	`size` INTEGER(11),
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- files_tracker
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `files_tracker`;


CREATE TABLE `files_tracker`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`referer_url` VARCHAR(500),
	`ip_addess` VARCHAR(20),
	`fileName` VARCHAR(500),
	`downloaded_time` DATETIME,
	PRIMARY KEY (`id`),
	KEY `ip_addess`(`ip_addess`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- gallery
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;


CREATE TABLE `gallery`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(500)  NOT NULL,
	`title_slug` VARCHAR(500)  NOT NULL,
	`description` TEXT,
	`created` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- ip_to_country
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ip_to_country`;


CREATE TABLE `ip_to_country`
(
	`ID` INTEGER(11)  NOT NULL,
	`ip_from` VARCHAR(100),
	`ip_to` VARCHAR(100),
	`sigla` VARCHAR(255),
	`code` VARCHAR(255),
	`country` VARCHAR(255),
	PRIMARY KEY (`ID`),
	KEY `ipranges`(`ip_from`, `ip_to`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- journal
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `journal`;


CREATE TABLE `journal`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(1024)  NOT NULL,
	`title_slug` VARCHAR(1024)  NOT NULL,
	`text_abstract` TEXT,
	`show_title` TINYINT(4) default 1,
	`show_abstract` TINYINT(4) default 1,
	`show_fulltext` TINYINT(4) default 1,
	`show_file_upload` TINYINT(4) default 1,
	`post_order_type` VARCHAR(50) default 'rank',
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- journal_post
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `journal_post`;


CREATE TABLE `journal_post`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(1024)  NOT NULL,
	`title_slug` VARCHAR(1024)  NOT NULL,
	`text_abstract` TEXT,
	`content` TEXT,
	`tags` VARCHAR(500),
	`creator_user_id` INTEGER(11),
	`created` DATETIME,
	`editor_user_id` INTEGER(11),
	`edited` DATETIME,
	`start_date` DATETIME,
	`end_date` DATETIME,
	`rank` INTEGER(11),
	`is_public` TINYINT(4),
	`journal_id` INTEGER(11)  NOT NULL,
	`file_id` INTEGER(11),
	`file_type` VARCHAR(10)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `journal_id`(`journal_id`),
	KEY `FK_journal_post`(`file_id`),
	KEY `FK_journal_post_creator`(`creator_user_id`),
	KEY `FK_journal_post_editor`(`editor_user_id`),
	CONSTRAINT `FK_journal_post`
		FOREIGN KEY (`file_id`)
		REFERENCES `files` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	CONSTRAINT `FK_journal_post_creator`
		FOREIGN KEY (`creator_user_id`)
		REFERENCES `admins` (`id`)
		ON UPDATE RESTRICT
		ON DELETE SET NULL,
	CONSTRAINT `FK_journal_post_editor`
		FOREIGN KEY (`editor_user_id`)
		REFERENCES `admins` (`id`)
		ON UPDATE RESTRICT
		ON DELETE SET NULL,
	CONSTRAINT `journal_post_fk`
		FOREIGN KEY (`journal_id`)
		REFERENCES `journal` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- mp_version
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mp_version`;


CREATE TABLE `mp_version`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`version` TEXT,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

#-----------------------------------------------------------------------------
#-- photos
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `photos`;


CREATE TABLE `photos`
(
	`id` INTEGER(11)  NOT NULL AUTO_INCREMENT,
	`album_id` INTEGER(11)  NOT NULL,
	`file_id` INTEGER(11)  NOT NULL,
	PRIMARY KEY (`id`),
	KEY `FK_photos`(`album_id`),
	KEY `FK_photos_files`(`file_id`),
	CONSTRAINT `FK_photos`
		FOREIGN KEY (`album_id`)
		REFERENCES `album` (`id`)
		ON UPDATE RESTRICT
		ON DELETE CASCADE,
	CONSTRAINT `FK_photos_files`
		FOREIGN KEY (`file_id`)
		REFERENCES `files` (`id`)
		ON UPDATE RESTRICT
		ON DELETE RESTRICT
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
