<?php



/**
 * This class defines the structure of the 'ip_to_country' table.
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
class IpToCountryTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.IpToCountryTableMap';

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
		$this->setName('ip_to_country');
		$this->setPhpName('IpToCountry');
		$this->setClassname('IpToCountry');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('IP_FROM', 'IpFrom', 'VARCHAR', false, 100, null);
		$this->addColumn('IP_TO', 'IpTo', 'VARCHAR', false, 100, null);
		$this->addColumn('SIGLA', 'Sigla', 'VARCHAR', false, 255, null);
		$this->addColumn('CODE', 'Code', 'VARCHAR', false, 255, null);
		$this->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

} // IpToCountryTableMap
