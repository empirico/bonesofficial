<?php



/**
 * This class defines the structure of the 'gallery' table.
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
class GalleryTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.GalleryTableMap';

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
		$this->setName('gallery');
		$this->setPhpName('Gallery');
		$this->setClassname('Gallery');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 500, null);
		$this->addColumn('TITLE_SLUG', 'TitleSlug', 'VARCHAR', true, 500, null);
		$this->addColumn('DESCRIPTION', 'Description', 'LONGVARCHAR', false, null, null);
		$this->addColumn('CREATED', 'Created', 'TIMESTAMP', false, null, null);
		// validators
		$this->addValidator('TITLE', 'required', 'propel.validator.RequiredValidator', '', 'title can\'t be empty');
		$this->addValidator('TITLE', 'unique', 'propel.validator.UniqueValidator', '', 'title already exists');
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Album', 'Album', RelationMap::ONE_TO_MANY, array('id' => 'gallery_id', ), 'CASCADE', 'RESTRICT');
	} // buildRelations()

} // GalleryTableMap
