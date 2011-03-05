<?php



/**
 * This class defines the structure of the 'acl_permissions' table.
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
class AclPermissionsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.AclPermissionsTableMap';

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
		$this->setName('acl_permissions');
		$this->setPhpName('AclPermissions');
		$this->setClassname('AclPermissions');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('MODULE', 'Module', 'VARCHAR', false, 20, null);
		$this->addForeignKey('ROLE_ID', 'RoleId', 'INTEGER', 'acl_roles', 'ID', false, 11, null);
		$this->addColumn('RESOURCE', 'Resource', 'VARCHAR', false, 500, null);
		$this->addColumn('ACTIONS', 'Actions', 'VARCHAR', false, 500, null);
		$this->addColumn('PERMISSION', 'Permission', 'INTEGER', false, 11, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AclRoles', 'AclRoles', RelationMap::MANY_TO_ONE, array('role_id' => 'id', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // AclPermissionsTableMap
