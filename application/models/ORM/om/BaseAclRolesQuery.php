<?php


/**
 * Base class that represents a query for the 'acl_roles' table.
 *
 * 
 *
 * @method     AclRolesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AclRolesQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     AclRolesQuery orderByParentRole($order = Criteria::ASC) Order by the parent_role column
 * @method     AclRolesQuery orderByIsFrontEnd($order = Criteria::ASC) Order by the is_front_end column
 *
 * @method     AclRolesQuery groupById() Group by the id column
 * @method     AclRolesQuery groupByName() Group by the name column
 * @method     AclRolesQuery groupByParentRole() Group by the parent_role column
 * @method     AclRolesQuery groupByIsFrontEnd() Group by the is_front_end column
 *
 * @method     AclRolesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AclRolesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AclRolesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AclRolesQuery leftJoinAclRolesRelatedByParentRole($relationAlias = '') Adds a LEFT JOIN clause to the query using the AclRolesRelatedByParentRole relation
 * @method     AclRolesQuery rightJoinAclRolesRelatedByParentRole($relationAlias = '') Adds a RIGHT JOIN clause to the query using the AclRolesRelatedByParentRole relation
 * @method     AclRolesQuery innerJoinAclRolesRelatedByParentRole($relationAlias = '') Adds a INNER JOIN clause to the query using the AclRolesRelatedByParentRole relation
 *
 * @method     AclRolesQuery leftJoinAclPermissions($relationAlias = '') Adds a LEFT JOIN clause to the query using the AclPermissions relation
 * @method     AclRolesQuery rightJoinAclPermissions($relationAlias = '') Adds a RIGHT JOIN clause to the query using the AclPermissions relation
 * @method     AclRolesQuery innerJoinAclPermissions($relationAlias = '') Adds a INNER JOIN clause to the query using the AclPermissions relation
 *
 * @method     AclRolesQuery leftJoinAclRolesRelatedById($relationAlias = '') Adds a LEFT JOIN clause to the query using the AclRolesRelatedById relation
 * @method     AclRolesQuery rightJoinAclRolesRelatedById($relationAlias = '') Adds a RIGHT JOIN clause to the query using the AclRolesRelatedById relation
 * @method     AclRolesQuery innerJoinAclRolesRelatedById($relationAlias = '') Adds a INNER JOIN clause to the query using the AclRolesRelatedById relation
 *
 * @method     AclRolesQuery leftJoinAdmins($relationAlias = '') Adds a LEFT JOIN clause to the query using the Admins relation
 * @method     AclRolesQuery rightJoinAdmins($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Admins relation
 * @method     AclRolesQuery innerJoinAdmins($relationAlias = '') Adds a INNER JOIN clause to the query using the Admins relation
 *
 * @method     AclRoles findOne(PropelPDO $con = null) Return the first AclRoles matching the query
 * @method     AclRoles findOneOrCreate(PropelPDO $con = null) Return the first AclRoles matching the query, or a new AclRoles object populated from the query conditions when no match is found
 *
 * @method     AclRoles findOneById(int $id) Return the first AclRoles filtered by the id column
 * @method     AclRoles findOneByName(string $name) Return the first AclRoles filtered by the name column
 * @method     AclRoles findOneByParentRole(int $parent_role) Return the first AclRoles filtered by the parent_role column
 * @method     AclRoles findOneByIsFrontEnd(int $is_front_end) Return the first AclRoles filtered by the is_front_end column
 *
 * @method     array findById(int $id) Return AclRoles objects filtered by the id column
 * @method     array findByName(string $name) Return AclRoles objects filtered by the name column
 * @method     array findByParentRole(int $parent_role) Return AclRoles objects filtered by the parent_role column
 * @method     array findByIsFrontEnd(int $is_front_end) Return AclRoles objects filtered by the is_front_end column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseAclRolesQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAclRolesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'AclRoles', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AclRolesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AclRolesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AclRolesQuery) {
			return $criteria;
		}
		$query = new AclRolesQuery();
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
	 * @return    AclRoles|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AclRolesPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AclRolesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AclRolesPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AclRolesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AclRolesPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the parent_role column
	 * 
	 * @param     int|array $parentRole The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByParentRole($parentRole = null, $comparison = null)
	{
		if (is_array($parentRole)) {
			$useMinMax = false;
			if (isset($parentRole['min'])) {
				$this->addUsingAlias(AclRolesPeer::PARENT_ROLE, $parentRole['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($parentRole['max'])) {
				$this->addUsingAlias(AclRolesPeer::PARENT_ROLE, $parentRole['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AclRolesPeer::PARENT_ROLE, $parentRole, $comparison);
	}

	/**
	 * Filter the query on the is_front_end column
	 * 
	 * @param     int|array $isFrontEnd The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByIsFrontEnd($isFrontEnd = null, $comparison = null)
	{
		if (is_array($isFrontEnd)) {
			$useMinMax = false;
			if (isset($isFrontEnd['min'])) {
				$this->addUsingAlias(AclRolesPeer::IS_FRONT_END, $isFrontEnd['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isFrontEnd['max'])) {
				$this->addUsingAlias(AclRolesPeer::IS_FRONT_END, $isFrontEnd['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AclRolesPeer::IS_FRONT_END, $isFrontEnd, $comparison);
	}

	/**
	 * Filter the query by a related AclRoles object
	 *
	 * @param     AclRoles $aclRoles  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByAclRolesRelatedByParentRole($aclRoles, $comparison = null)
	{
		return $this
			->addUsingAlias(AclRolesPeer::PARENT_ROLE, $aclRoles->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AclRolesRelatedByParentRole relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function joinAclRolesRelatedByParentRole($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AclRolesRelatedByParentRole');
		
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
			$this->addJoinObject($join, 'AclRolesRelatedByParentRole');
		}
		
		return $this;
	}

	/**
	 * Use the AclRolesRelatedByParentRole relation AclRoles object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclRolesQuery A secondary query class using the current class as primary query
	 */
	public function useAclRolesRelatedByParentRoleQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAclRolesRelatedByParentRole($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AclRolesRelatedByParentRole', 'AclRolesQuery');
	}

	/**
	 * Filter the query by a related AclPermissions object
	 *
	 * @param     AclPermissions $aclPermissions  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByAclPermissions($aclPermissions, $comparison = null)
	{
		return $this
			->addUsingAlias(AclRolesPeer::ID, $aclPermissions->getRoleId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AclPermissions relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function joinAclPermissions($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AclPermissions');
		
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
			$this->addJoinObject($join, 'AclPermissions');
		}
		
		return $this;
	}

	/**
	 * Use the AclPermissions relation AclPermissions object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclPermissionsQuery A secondary query class using the current class as primary query
	 */
	public function useAclPermissionsQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAclPermissions($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AclPermissions', 'AclPermissionsQuery');
	}

	/**
	 * Filter the query by a related AclRoles object
	 *
	 * @param     AclRoles $aclRoles  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByAclRolesRelatedById($aclRoles, $comparison = null)
	{
		return $this
			->addUsingAlias(AclRolesPeer::ID, $aclRoles->getParentRole(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AclRolesRelatedById relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function joinAclRolesRelatedById($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AclRolesRelatedById');
		
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
			$this->addJoinObject($join, 'AclRolesRelatedById');
		}
		
		return $this;
	}

	/**
	 * Use the AclRolesRelatedById relation AclRoles object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclRolesQuery A secondary query class using the current class as primary query
	 */
	public function useAclRolesRelatedByIdQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAclRolesRelatedById($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AclRolesRelatedById', 'AclRolesQuery');
	}

	/**
	 * Filter the query by a related Admins object
	 *
	 * @param     Admins $admins  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function filterByAdmins($admins, $comparison = null)
	{
		return $this
			->addUsingAlias(AclRolesPeer::ID, $admins->getRole(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Admins relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function joinAdmins($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Admins');
		
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
			$this->addJoinObject($join, 'Admins');
		}
		
		return $this;
	}

	/**
	 * Use the Admins relation Admins object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminsQuery A secondary query class using the current class as primary query
	 */
	public function useAdminsQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAdmins($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Admins', 'AdminsQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     AclRoles $aclRoles Object to remove from the list of results
	 *
	 * @return    AclRolesQuery The current query, for fluid interface
	 */
	public function prune($aclRoles = null)
	{
		if ($aclRoles) {
			$this->addUsingAlias(AclRolesPeer::ID, $aclRoles->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAclRolesQuery
