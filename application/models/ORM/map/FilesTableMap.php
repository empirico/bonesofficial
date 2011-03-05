<?php



/**
 * This class defines the structure of the 'files' table.
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
class FilesTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.FilesTableMap';

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
		$this->setName('files');
		$this->setPhpName('Files');
		$this->setClassname('Files');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('FILENAME', 'Filename', 'VARCHAR', true, 255, null);
		$this->addColumn('MIMETYPE', 'Mimetype', 'VARCHAR', false, 50, null);
		$this->addColumn('SIZE', 'Size', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Events', 'Events', RelationMap::ONE_TO_MANY, array('id' => 'image_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('JournalPost', 'JournalPost', RelationMap::ONE_TO_MANY, array('id' => 'file_id', ), 'SET NULL', 'SET NULL');
    $this->addRelation('Photos', 'Photos', RelationMap::ONE_TO_MANY, array('id' => 'file_id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // FilesTableMap
