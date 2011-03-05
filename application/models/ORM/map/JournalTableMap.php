<?php



/**
 * This class defines the structure of the 'journal' table.
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
class JournalTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.JournalTableMap';

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
		$this->setName('journal');
		$this->setPhpName('Journal');
		$this->setClassname('Journal');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 1024, null);
		$this->addColumn('TITLE_SLUG', 'TitleSlug', 'VARCHAR', true, 1024, null);
		$this->addColumn('TEXT_ABSTRACT', 'TextAbstract', 'LONGVARCHAR', false, null, null);
		$this->addColumn('SHOW_TITLE', 'ShowTitle', 'TINYINT', false, 4, 1);
		$this->addColumn('SHOW_ABSTRACT', 'ShowAbstract', 'TINYINT', false, 4, 1);
		$this->addColumn('SHOW_FULLTEXT', 'ShowFulltext', 'TINYINT', false, 4, 1);
		$this->addColumn('SHOW_FILE_UPLOAD', 'ShowFileUpload', 'TINYINT', false, 4, 1);
		$this->addColumn('POST_ORDER_TYPE', 'PostOrderType', 'VARCHAR', false, 50, 'rank');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('JournalPost', 'JournalPost', RelationMap::ONE_TO_MANY, array('id' => 'journal_id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // JournalTableMap
