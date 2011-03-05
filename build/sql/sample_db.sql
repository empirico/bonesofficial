/*
SQLyog Community v8.3 
MySQL - 5.1.37-1ubuntu5 : Database - limelight
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`limelight` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `acl_permissions` */

DROP TABLE IF EXISTS `acl_permissions`;

CREATE TABLE `acl_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `resource` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `action` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `permission` int(11) DEFAULT '0' COMMENT '0-> deny; 1 -> allow',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `acl_permissions` */

insert  into `acl_permissions`(`id`,`role_type`,`role_id`,`resource`,`action`,`permission`) values (1,'admin',4,'page','edit#save#show#index',1);
insert  into `acl_permissions`(`id`,`role_type`,`role_id`,`resource`,`action`,`permission`) values (5,'admin',1,'index','index',1);
insert  into `acl_permissions`(`id`,`role_type`,`role_id`,`resource`,`action`,`permission`) values (7,'admin',1,'journal','index',1);
insert  into `acl_permissions`(`id`,`role_type`,`role_id`,`resource`,`action`,`permission`) values (8,'admin',5,'error','error',1);
insert  into `acl_permissions`(`id`,`role_type`,`role_id`,`resource`,`action`,`permission`) values (10,'admin',5,'page','new',1);
insert  into `acl_permissions`(`id`,`role_type`,`role_id`,`resource`,`action`,`permission`) values (11,'admin',1,'acl','index#show#new#edit#save#get-data',1);

/*Table structure for table `admins` */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_admins_roles` (`role`),
  CONSTRAINT `FK_admins` FOREIGN KEY (`role`) REFERENCES `admins_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `admins` */

insert  into `admins`(`id`,`username`,`password`,`role`) values (1,'empirico','asd',1);

/*Table structure for table `admins_roles` */

DROP TABLE IF EXISTS `admins_roles`;

CREATE TABLE `admins_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `parent_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_admins_roles_parent` (`parent_role`),
  CONSTRAINT `FK_admins_roles` FOREIGN KEY (`parent_role`) REFERENCES `admins_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `admins_roles` */

insert  into `admins_roles`(`id`,`name`,`parent_role`) values (1,'superadmin',2);
insert  into `admins_roles`(`id`,`name`,`parent_role`) values (2,'admin',3);
insert  into `admins_roles`(`id`,`name`,`parent_role`) values (3,'publisher',4);
insert  into `admins_roles`(`id`,`name`,`parent_role`) values (4,'editor',5);
insert  into `admins_roles`(`id`,`name`,`parent_role`) values (5,'guest',NULL);

/*Table structure for table `contents` */

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  `title_slug` varchar(1024) NOT NULL,
  `text_abstract` text,
  `content` text,
  `rank` int(11) DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  CONSTRAINT `pages_contents_fk` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `contents` */

insert  into `contents`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`rank`,`page_id`) values (1,'i. c. mahatma gandhi - home page ','i-c-mahatma-gandhi-home-page','<br />','<strong>BENVENUTO NEL SITO UFFICIALE DELL\\\' ISTITUTO COMPRENSIVO &quot;MAHATMA GANDHI&quot;</strong><br />\r\n<br />\r\nL\\\'Istituto Comprensivo &quot;Mahatma Gandhi&quot; nasce il 1&deg; settembre<br />\r\ndel 2000 dalla fusione di tre diversi<br />\r\nordini di scuola dei comuni di Trezzano Rosa e di Grezzago .<br />\r\nL\\\'attenzione al servizio erogato &egrave; da sempre impegno dell\\\'istituto Gandhi.<br />\r\n<br />\r\nTutti i docenti dell\\\'Istituto, per consentire la formazione culturale, personale e sociale dell\\\'alunno, condividono le stesse finalit&agrave; per l\\\'intero percorso formativo (vedi POF). L\\\'istituto, in ossequio ai principi costituzionali, educa gli studenti ai valori della civile convivenza, della democrazia, della libert&agrave;, della solidariet&agrave;, e al rifiuto di ogni forma di discriminazione di razza, religione, nazione e sesso.<br />\r\nL\\\'istituto dipende dal MIUR (Ministero dell\\\'Istruzione, dell\\\'Universit&agrave; e della Ricerca) e dalla Direzione Generale Scolastica della Regione Lombardia per quanto attiene alla sua attivit&agrave; didattico-formativa; dall\\\'Amministrazione Provinciale di Milano per quanto concerne l\\\'erogazione delle risorse atte a consentire il funzionamento della struttura scolastica.<br />\r\n<br />\r\nL\\\' Istituto intrattiene collaborazioni con enti pubblici o associazioni (es.: Amministrazioni comunali di Trezzano Rosa e Grezzago, Biblioteca, associazione Aiutiamoli a vivere, Assistenti sociali di Trezzano Rosa e Grezzago, UOMPIA di Usmate, Centro Don Gnocchi di Pessano, Centro Armonia di Pozzo d\\\'Adda).<br />\r\n&nbsp;<br />',1,5);
insert  into `contents`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`rank`,`page_id`) values (2,'Le scuole','le-scuole','<br />','Biografia<br />',1,6);
insert  into `contents`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`rank`,`page_id`) values (3,'Il batterista culattone','il-batterista-culattone','<br />','<br />',1,9);
insert  into `contents`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`rank`,`page_id`) values (4,'i. c. mahatma gandhi - POF 2009/2010','i-c-mahatma-gandhi-pof-2009-2010','<br />','<strong><img height=\\\"268\\\" width=\\\"468\\\" alt=\\\"\\\" src=\\\"/upload/image/POF/pof.jpg\\\" /><br />\r\nPIANO DELL\\\'OFFERTA FORMATIVA</strong><br />\r\nAnno scolastico 2009-2010<br />\r\n<em>Delibera C. I. n&deg; 1 del 17/12/2009</em><br />\r\n<br />\r\nIl Pof &egrave; il documento fondamentale costitutivo dell\\\'identit&agrave; culturale e progettuale di ogni istituzione scolastica. I docenti dell\\\'Istituto hanno elaborato un progetto educativo che permetta agli alunni di vivere in una scuola che dioporca:<br />\r\n<br />\r\nACCOGLIE<br />\r\nRECUPERA I DISAGI<br />\r\nCREA CONTINUITA\\\' E ORIENTA<br />\r\nFORMA PERSONALITA\\\'<br />\r\nPROMUOVE COMPETENZE E ABILITA\\\'<br />\r\n<br />\r\n<strong>FINALITA\\\'</strong><br />\r\nLa scuola progetta la propria offerta formativa, attraverso la quale l\\\'alunno sar&agrave; in grado di trasformare conoscenze e abilit&agrave; in competenze personali, e intende valorizzare il contributo della famiglia e delle esperienze extrascolastiche.<br />\r\n<br />\r\nI docenti accompagnano l\\\'alunno per l\\\'intero percorso formativo, predisponendo le condizioni organizzative, professionali e umane che gli consentiranno di porre le premesse per realizzare un progetto personale di vita.<br />',1,10);
insert  into `contents`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`rank`,`page_id`) values (5,'Segreteria','segreteria','<br />','<br />',1,11);
insert  into `contents`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`rank`,`page_id`) values (6,'home eng','home-eng','<br />','english Home Page<br />',1,13);
insert  into `contents`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`rank`,`page_id`) values (7,'Organico','organico','<br />','<style type=\\\"text/css\\\"> .culo {border: 10px solid green;}</style>\r\n<div class=\\\"culo\\\"><img height=\\\"115\\\" width=\\\"200\\\" src=\\\"/upload/image/POF/pof.jpg\\\" alt=\\\"\\\" /></div>\r\nQuesto &egrave; l\\\'organico<br />',1,14);

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_bin NOT NULL,
  `mimetype` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `files` */

insert  into `files`(`id`,`filename`,`mimetype`,`size`) values (53,'pof.pdf','application/pdf',459743);
insert  into `files`(`id`,`filename`,`mimetype`,`size`) values (54,'file-test.doc','text/plain',0);

/*Table structure for table `journal` */

DROP TABLE IF EXISTS `journal`;

CREATE TABLE `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  `title_slug` varchar(1024) NOT NULL,
  `text_abstract` text,
  `page_id` int(11) DEFAULT NULL,
  `show_title` tinyint(4) DEFAULT '1',
  `show_abstract` tinyint(4) DEFAULT '1',
  `show_fulltext` tinyint(4) DEFAULT '1',
  `show_file_upload` tinyint(4) DEFAULT '1',
  `post_order_type` varchar(50) DEFAULT 'rank',
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  CONSTRAINT `journal_fk` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `journal` */

insert  into `journal`(`id`,`title`,`title_slug`,`text_abstract`,`page_id`,`show_title`,`show_abstract`,`show_fulltext`,`show_file_upload`,`post_order_type`) values (1,'News from underground','news-from-underground','Abstract, descrizione delle News',NULL,1,1,1,1,'rank');
insert  into `journal`(`id`,`title`,`title_slug`,`text_abstract`,`page_id`,`show_title`,`show_abstract`,`show_fulltext`,`show_file_upload`,`post_order_type`) values (2,'Live news from underground','live-news-from-underground','abstract for Live news from underground',8,1,1,1,1,'rank');
insert  into `journal`(`id`,`title`,`title_slug`,`text_abstract`,`page_id`,`show_title`,`show_abstract`,`show_fulltext`,`show_file_upload`,`post_order_type`) values (3,'','',NULL,12,1,1,1,1,'rank');
insert  into `journal`(`id`,`title`,`title_slug`,`text_abstract`,`page_id`,`show_title`,`show_abstract`,`show_fulltext`,`show_file_upload`,`post_order_type`) values (4,'Modulistica','modulistica','QUESTO&nbsp;E\\\' L\\\'ARCHIVIO&nbsp;FILES!!!!<br />',15,1,1,0,1,'rank');

/*Table structure for table `journal_post` */

DROP TABLE IF EXISTS `journal_post`;

CREATE TABLE `journal_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  `title_slug` varchar(1024) NOT NULL,
  `text_abstract` text,
  `content` text,
  `tags` varchar(500) DEFAULT NULL,
  `creator_user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor_user_id` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_public` tinyint(4) DEFAULT NULL,
  `journal_id` int(11) NOT NULL,
  `file_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `journal_id` (`journal_id`),
  KEY `FK_journal_post` (`file_id`),
  KEY `FK_journal_post_creator` (`creator_user_id`),
  KEY `FK_journal_post_editor` (`editor_user_id`),
  CONSTRAINT `FK_journal_post` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_journal_post_creator` FOREIGN KEY (`creator_user_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_journal_post_editor` FOREIGN KEY (`editor_user_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `journal_post_fk` FOREIGN KEY (`journal_id`) REFERENCES `journal` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `journal_post` */

insert  into `journal_post`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`tags`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`start_date`,`end_date`,`rank`,`is_public`,`journal_id`,`file_id`) values (1,'This is the first Post on the Journal!','this-is-the-first-post-on-the-journal','This is the abstract!&nbsp;Ignore if you don\\\'t care<br />','This is the main content!!!!<br />',NULL,NULL,'2010-08-23 17:20:00',NULL,NULL,NULL,NULL,1,NULL,1,NULL);
insert  into `journal_post`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`tags`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`start_date`,`end_date`,`rank`,`is_public`,`journal_id`,`file_id`) values (2,'This is the second Post on the Journal!','this-is-the-second-post-on-the-journal','This is the abstract!&nbsp;Ignore if you don\\\'t care<br />','This is the main content!!!!<br />',NULL,NULL,'2010-08-23 17:20:03',NULL,NULL,NULL,NULL,2,NULL,1,NULL);
insert  into `journal_post`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`tags`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`start_date`,`end_date`,`rank`,`is_public`,`journal_id`,`file_id`) values (3,'Questo Ã¨ il terzo Post del diario','questo-il-terzo-post-del-diario','Abstracto!!!<br />','ullalla ullalla<br />',NULL,NULL,'2010-08-23 17:29:38',NULL,NULL,NULL,NULL,3,NULL,1,NULL);
insert  into `journal_post`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`tags`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`start_date`,`end_date`,`rank`,`is_public`,`journal_id`,`file_id`) values (4,'Test PDF','test-pdf','saadasdasd<br />',NULL,NULL,NULL,'2010-09-05 20:19:31',NULL,NULL,'2010-09-15 00:00:00',NULL,1,1,4,53);
insert  into `journal_post`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`tags`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`start_date`,`end_date`,`rank`,`is_public`,`journal_id`,`file_id`) values (5,'TEST doc','test-doc','TEstiamo il .doc<br />',NULL,NULL,NULL,'2010-09-05 20:19:19',NULL,NULL,'2010-09-05 00:00:00',NULL,1,1,4,54);
insert  into `journal_post`(`id`,`title`,`title_slug`,`text_abstract`,`content`,`tags`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`start_date`,`end_date`,`rank`,`is_public`,`journal_id`,`file_id`) values (7,'test png dovrebbe dare errore','test-png-dovrebbe-dare-errore','test a jpg<br />',NULL,NULL,NULL,'2010-09-05 20:19:07',NULL,NULL,'2010-09-05 00:00:00',NULL,1,1,4,NULL);

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `title_slug` varchar(500) NOT NULL,
  `display_name` varchar(50) DEFAULT NULL,
  `page_type` varchar(20) NOT NULL DEFAULT 'content',
  `creator_user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `editor_user_id` int(11) DEFAULT NULL,
  `edited` datetime DEFAULT NULL,
  `is_public` tinyint(4) DEFAULT '0',
  `parent_id` int(11) DEFAULT NULL,
  `locale` varchar(3) NOT NULL DEFAULT 'it',
  `rank` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `menu_type` varchar(40) DEFAULT 'menu_none',
  `is_homepage` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`page_type`),
  KEY `parent_id` (`parent_id`),
  KEY `FK_pages_creator` (`creator_user_id`),
  KEY `FK_pages_editor` (`editor_user_id`),
  CONSTRAINT `FK_pages_creator` FOREIGN KEY (`creator_user_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_pages_editor` FOREIGN KEY (`editor_user_id`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  CONSTRAINT `parent_fk` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `pages` */

insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (1,'main','main','main','content',NULL,'2010-08-20 13:57:28',NULL,NULL,1,NULL,'it',1,1,'menu_none',0);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (5,'home','i-c-mahatma-gandhi-home-page','home','content',NULL,'2010-09-05 19:04:24',1,'2010-09-06 23:27:21',1,1,'it',1,1,'menu_childs',1);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (6,'scuole','le-scuole','Le Scuole','content',NULL,'2010-09-04 10:24:59',NULL,NULL,1,1,'it',2,1,'menu_childs',0);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (8,'live_news','live-news-from-underground','live_news','journal',NULL,'2010-08-20 16:02:07',NULL,NULL,1,NULL,'it',1,2,'menu_none',0);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (9,'Drum','il-batterista-culattone','Batteria','content',NULL,'2010-09-04 10:26:12',NULL,NULL,NULL,6,'it',1,1,'menu_none',0);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (10,'POF','i-c-mahatma-gandhi-pof-2009-2010','POF','content',NULL,'2010-09-01 22:18:15',NULL,NULL,1,5,'it',1,1,'menu_siblings',0);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (11,'segreteria','segreteria','Segreteria','content',NULL,'2010-08-29 10:44:29',NULL,NULL,1,1,'it',3,1,'menu_none',0);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (12,'newsletter','','newsletter','journal',NULL,'2010-09-01 22:24:34',NULL,NULL,1,1,'it',5,1,NULL,0);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (13,'test','home-eng','test eng','content',NULL,'2010-09-04 09:52:51',NULL,NULL,1,1,'en',1,1,'menu_none',1);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (14,'organico','organico','Organico','content',NULL,'2010-09-02 22:55:41',NULL,NULL,1,5,'it',2,1,'menu_siblings',0);
insert  into `pages`(`id`,`name`,`title_slug`,`display_name`,`page_type`,`creator_user_id`,`created`,`editor_user_id`,`edited`,`is_public`,`parent_id`,`locale`,`rank`,`status`,`menu_type`,`is_homepage`) values (15,'FILE_ARCH','modulistica','Modulistica','journal',NULL,'2010-09-05 19:50:10',1,'2010-09-09 14:26:37',1,1,'it',4,1,'menu_none',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
