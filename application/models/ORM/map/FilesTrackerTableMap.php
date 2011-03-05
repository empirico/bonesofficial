<?php



/**
 * This class defines the structure of the 'files_tracker' table.
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
class FilesTrackerTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.FilesTrackerTableMap';

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
		$this->setName('files_tracker');
		$this->setPhpName('FilesTracker');
		$this->setClassname('FilesTracker');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('REFERER_URL', 'RefererUrl', 'VARCHAR', false, 500, null);
		$this->addColumn('IP_ADDESS', 'IpAddess', 'VARCHAR', false, 20, null);
		$this->addColumn('FILENAME', 'Filename', 'VARCHAR', false, 500, null);
		$this->addColumn('DOWNLOADED_TIME', 'DownloadedTime', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // FilesTrackerTableMap
