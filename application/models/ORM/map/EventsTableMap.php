<?php



/**
 * This class defines the structure of the 'events' table.
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
class EventsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.EventsTableMap';

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
		$this->setName('events');
		$this->setPhpName('Events');
		$this->setClassname('Events');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
		$this->addColumn('VENUE', 'Venue', 'VARCHAR', false, 500, null);
		$this->addColumn('ADDRESS', 'Address', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED', 'Created', 'TIMESTAMP', false, null, null);
		$this->addColumn('START_DATE', 'StartDate', 'TIMESTAMP', false, null, null);
		$this->addColumn('END_DATE', 'EndDate', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('IMAGE_ID', 'ImageId', 'INTEGER', 'files', 'ID', false, 11, null);
		$this->addColumn('IS_PUBLIC', 'IsPublic', 'TINYINT', false, 4, 0);
		$this->addColumn('EVENT_TYPE', 'EventType', 'VARCHAR', true, 255, null);
		$this->addColumn('FACEBOOK_ID', 'FacebookId', 'VARCHAR', true, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Files', 'Files', RelationMap::MANY_TO_ONE, array('image_id' => 'id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // EventsTableMap
