<?php



/**
 * This class defines the structure of the 'acl_roles' table.
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
class AclRolesTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'ORM.map.AclRolesTableMap';

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
		$this->setName('acl_roles');
		$this->setPhpName('AclRoles');
		$this->setClassname('AclRoles');
		$this->setPackage('ORM');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 20, null);
		$this->addForeignKey('PARENT_ROLE', 'ParentRole', 'INTEGER', 'acl_roles', 'ID', false, 11, null);
		$this->addColumn('IS_FRONT_END', 'IsFrontEnd', 'TINYINT', false, 4, 0);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('AclRolesRelatedByParentRole', 'AclRoles', RelationMap::MANY_TO_ONE, array('parent_role' => 'id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('AclPermissions', 'AclPermissions', RelationMap::ONE_TO_MANY, array('id' => 'role_id', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('AclRolesRelatedById', 'AclRoles', RelationMap::ONE_TO_MANY, array('id' => 'parent_role', ), 'RESTRICT', 'RESTRICT');
    $this->addRelation('Admins', 'Admins', RelationMap::ONE_TO_MANY, array('id' => 'role', ), 'RESTRICT', 'RESTRICT');
	} // buildRelations()

} // AclRolesTableMap
