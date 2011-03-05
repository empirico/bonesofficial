<?php



/**
 * This class defines the structure of the 'album' table.
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
class AlbumTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.AlbumTableMap';

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
		$this->setName('album');
		$this->setPhpName('Album');
		$this->setClassname('Album');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', true, 500, null);
		$this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 500, null);
		$this->addForeignKey('GALLERY_ID', 'GalleryId', 'INTEGER', 'gallery', 'ID', true, 11, null);
		$this->addColumn('COVER_PHOTO_ID', 'CoverPhotoId', 'INTEGER', false, 11, null);
		$this->addColumn('RANK', 'Rank', 'INTEGER', false, 11, 1);
		$this->addColumn('IS_PUBLIC', 'IsPublic', 'INTEGER', false, 11, 0);
		$this->addColumn('MAX_WIDTH', 'MaxWidth', 'INTEGER', false, 11, null);
		$this->addColumn('MAX_HEIGHT', 'MaxHeight', 'INTEGER', false, 11, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Gallery', 'Gallery', RelationMap::MANY_TO_ONE, array('gallery_id' => 'id', ), 'CASCADE', 'RESTRICT');
    $this->addRelation('Photos', 'Photos', RelationMap::ONE_TO_MANY, array('id' => 'album_id', ), 'CASCADE', 'RESTRICT');
	} // buildRelations()

} // AlbumTableMap
