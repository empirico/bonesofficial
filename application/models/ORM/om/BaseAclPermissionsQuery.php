<?php


/**
 * Base class that represents a query for the 'acl_permissions' table.
 *
 * 
 *
 * @method     AclPermissionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AclPermissionsQuery orderByModule($order = Criteria::ASC) Order by the module column
 * @method     AclPermissionsQuery orderByRoleId($order = Criteria::ASC) Order by the role_id column
 * @method     AclPermissionsQuery orderByResource($order = Criteria::ASC) Order by the resource column
 * @method     AclPermissionsQuery orderByActions($order = Criteria::ASC) Order by the actions column
 * @method     AclPermissionsQuery orderByPermission($order = Criteria::ASC) Order by the permission column
 *
 * @method     AclPermissionsQuery groupById() Group by the id column
 * @method     AclPermissionsQuery groupByModule() Group by the module column
 * @method     AclPermissionsQuery groupByRoleId() Group by the role_id column
 * @method     AclPermissionsQuery groupByResource() Group by the resource column
 * @method     AclPermissionsQuery groupByActions() Group by the actions column
 * @method     AclPermissionsQuery groupByPermission() Group by the permission column
 *
 * @method     AclPermissionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AclPermissionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AclPermissionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AclPermissionsQuery leftJoinAclRoles($relationAlias = '') Adds a LEFT JOIN clause to the query using the AclRoles relation
 * @method     AclPermissionsQuery rightJoinAclRoles($relationAlias = '') Adds a RIGHT JOIN clause to the query using the AclRoles relation
 * @method     AclPermissionsQuery innerJoinAclRoles($relationAlias = '') Adds a INNER JOIN clause to the query using the AclRoles relation
 *
 * @method     AclPermissions findOne(PropelPDO $con = null) Return the first AclPermissions matching the query
 * @method     AclPermissions findOneOrCreate(PropelPDO $con = null) Return the first AclPermissions matching the query, or a new AclPermissions object populated from the query conditions when no match is found
 *
 * @method     AclPermissions findOneById(int $id) Return the first AclPermissions filtered by the id column
 * @method     AclPermissions findOneByModule(string $module) Return the first AclPermissions filtered by the module column
 * @method     AclPermissions findOneByRoleId(int $role_id) Return the first AclPermissions filtered by the role_id column
 * @method     AclPermissions findOneByResource(string $resource) Return the first AclPermissions filtered by the resource column
 * @method     AclPermissions findOneByActions(string $actions) Return the first AclPermissions filtered by the actions column
 * @method     AclPermissions findOneByPermission(int $permission) Return the first AclPermissions filtered by the permission column
 *
 * @method     array findById(int $id) Return AclPermissions objects filtered by the id column
 * @method     array findByModule(string $module) Return AclPermissions objects filtered by the module column
 * @method     array findByRoleId(int $role_id) Return AclPermissions objects filtered by the role_id column
 * @method     array findByResource(string $resource) Return AclPermissions objects filtered by the resource column
 * @method     array findByActions(string $actions) Return AclPermissions objects filtered by the actions column
 * @method     array findByPermission(int $permission) Return AclPermissions objects filtered by the permission column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseAclPermissionsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAclPermissionsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'AclPermissions', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AclPermissionsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AclPermissionsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AclPermissionsQuery) {
			return $criteria;
		}
		$query = new AclPermissionsQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    AclPermissions|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AclPermissionsPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AclPermissionsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AclPermissionsPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AclPermissionsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the module column
	 * 
	 * @param     string $module The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterByModule($module = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($module)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $module)) {
				$module = str_replace('*', '%', $module);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AclPermissionsPeer::MODULE, $module, $comparison);
	}

	/**
	 * Filter the query on the role_id column
	 * 
	 * @param     int|array $roleId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterByRoleId($roleId = null, $comparison = null)
	{
		if (is_array($roleId)) {
			$useMinMax = false;
			if (isset($roleId['min'])) {
				$this->addUsingAlias(AclPermissionsPeer::ROLE_ID, $roleId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($roleId['max'])) {
				$this->addUsingAlias(AclPermissionsPeer::ROLE_ID, $roleId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AclPermissionsPeer::ROLE_ID, $roleId, $comparison);
	}

	/**
	 * Filter the query on the resource column
	 * 
	 * @param     string $resource The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterByResource($resource = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($resource)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $resource)) {
				$resource = str_replace('*', '%', $resource);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AclPermissionsPeer::RESOURCE, $resource, $comparison);
	}

	/**
	 * Filter the query on the actions column
	 * 
	 * @param     string $actions The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterByActions($actions = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($actions)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $actions)) {
				$actions = str_replace('*', '%', $actions);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AclPermissionsPeer::ACTIONS, $actions, $comparison);
	}

	/**
	 * Filter the query on the permission column
	 * 
	 * @param     int|array $permission The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterByPermission($permission = null, $comparison = null)
	{
		if (is_array($permission)) {
			$useMinMax = false;
			if (isset($permission['min'])) {
				$this->addUsingAlias(AclPermissionsPeer::PERMISSION, $permission['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($permission['max'])) {
				$this->addUsingAlias(AclPermissionsPeer::PERMISSION, $permission['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AclPermissionsPeer::PERMISSION, $permission, $comparison);
	}

	/**
	 * Filter the query by a related AclRoles object
	 *
	 * @param     AclRoles $aclRoles  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function filterByAclRoles($aclRoles, $comparison = null)
	{
		return $this
			->addUsingAlias(AclPermissionsPeer::ROLE_ID, $aclRoles->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AclRoles relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function joinAclRoles($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AclRoles');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'AclRoles');
		}
		
		return $this;
	}

	/**
	 * Use the AclRoles relation AclRoles object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclRolesQuery A secondary query class using the current class as primary query
	 */
	public function useAclRolesQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAclRoles($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AclRoles', 'AclRolesQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AclPermissions $aclPermissions Object to remove from the list of results
	 *
	 * @return    AclPermissionsQuery The current query, for fluid interface
	 */
	public function prune($aclPermissions = null)
	{
		if ($aclPermissions) {
			$this->addUsingAlias(AclPermissionsPeer::ID, $aclPermissions->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAclPermissionsQuery
