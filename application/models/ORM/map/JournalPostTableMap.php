<?php



/**
 * This class defines the structure of the 'journal_post' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.ORM.map
 */
class JournalPostTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.JournalPostTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('journal_post');
		$this->setPhpName('JournalPost');
		$this->setClassname('JournalPost');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 1024, null);
		$this->addColumn('TITLE_SLUG', 'TitleSlug', 'VARCHAR', true, 1024, null);
		$this->addColumn('TEXT_ABSTRACT', 'TextAbstract', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CONTENT', 'Content', 'LONGVARCHAR', false, null, null);
		$this->addColumn('TAGS', 'Tags', 'VARCHAR', false, 500, null);
		$this->addForeignKey('CREATOR_USER_ID', 'CreatorUserId', 'INTEGER', 'admins', 'ID', false, 11, null);
		$this->addColumn('CREATED', 'Created', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('EDITOR_USER_ID', 'EditorUserId', 'INTEGER', 'admins', 'ID', false, 11, null);
		$this->addColumn('EDITED', 'Edited', 'TIMESTAMP', false, null, null);
		$this->addColumn('START_DATE', 'StartDate', 'TIMESTAMP', false, null, null);
		$this->addColumn('END_DATE', 'EndDate', 'TIMESTAMP', false, null, null);
		$this->addColumn('RANK', 'Rank', 'INTEGER', false, 11, null);
		$this->addColumn('IS_PUBLIC', 'IsPublic', 'TINYINT', false, 4, null);
		$this->addForeignKey('JOURNAL_ID', 'JournalId', 'INTEGER', 'journal', 'ID', true, 11, null);
		$this->addForeignKey('FILE_ID', 'FileId', 'INTEGER', 'files', 'ID', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Files', 'Files', RelationMap::MANY_TO_ONE, array('file_id' => 'id', ), 'SET NULL', 'SET NULL');
    $this->addRelation('AdminsRelatedByCreatorUserId', 'Admins', RelationMap::MANY_TO_ONE, array('creator_user_id' => 'id', ), 'SET NULL', 'RESTRICT');
    $this->addRelation('AdminsRelatedByEditorUserId', 'Admins', RelationMap::MANY_TO_ONE, array('editor_user_id' => 'id', ), 'SET NULL', 'RESTRICT');
    $this->addRelation('Journal', 'Journal', RelationMap::MANY_TO_ONE, array('journal_id' => 'id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // JournalPostTableMap
