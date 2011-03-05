<?php


/**
 * Base class that represents a query for the 'admins' table.
 *
 * 
 *
 * @method     AdminsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AdminsQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method     AdminsQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method     AdminsQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     AdminsQuery orderByRole($order = Criteria::ASC) Order by the role column
 *
 * @method     AdminsQuery groupById() Group by the id column
 * @method     AdminsQuery groupByUsername() Group by the username column
 * @method     AdminsQuery groupByPassword() Group by the password column
 * @method     AdminsQuery groupByEmail() Group by the email column
 * @method     AdminsQuery groupByRole() Group by the role column
 *
 * @method     AdminsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AdminsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AdminsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AdminsQuery leftJoinAclRoles($relationAlias = '') Adds a LEFT JOIN clause to the query using the AclRoles relation
 * @method     AdminsQuery rightJoinAclRoles($relationAlias = '') Adds a RIGHT JOIN clause to the query using the AclRoles relation
 * @method     AdminsQuery innerJoinAclRoles($relationAlias = '') Adds a INNER JOIN clause to the query using the AclRoles relation
 *
 * @method     AdminsQuery leftJoinJournalPostRelatedByCreatorUserId($relationAlias = '') Adds a LEFT JOIN clause to the query using the JournalPostRelatedByCreatorUserId relation
 * @method     AdminsQuery rightJoinJournalPostRelatedByCreatorUserId($relationAlias = '') Adds a RIGHT JOIN clause to the query using the JournalPostRelatedByCreatorUserId relation
 * @method     AdminsQuery innerJoinJournalPostRelatedByCreatorUserId($relationAlias = '') Adds a INNER JOIN clause to the query using the JournalPostRelatedByCreatorUserId relation
 *
 * @method     AdminsQuery leftJoinJournalPostRelatedByEditorUserId($relationAlias = '') Adds a LEFT JOIN clause to the query using the JournalPostRelatedByEditorUserId relation
 * @method     AdminsQuery rightJoinJournalPostRelatedByEditorUserId($relationAlias = '') Adds a RIGHT JOIN clause to the query using the JournalPostRelatedByEditorUserId relation
 * @method     AdminsQuery innerJoinJournalPostRelatedByEditorUserId($relationAlias = '') Adds a INNER JOIN clause to the query using the JournalPostRelatedByEditorUserId relation
 *
 * @method     Admins findOne(PropelPDO $con = null) Return the first Admins matching the query
 * @method     Admins findOneOrCreate(PropelPDO $con = null) Return the first Admins matching the query, or a new Admins object populated from the query conditions when no match is found
 *
 * @method     Admins findOneById(int $id) Return the first Admins filtered by the id column
 * @method     Admins findOneByUsername(string $username) Return the first Admins filtered by the username column
 * @method     Admins findOneByPassword(string $password) Return the first Admins filtered by the password column
 * @method     Admins findOneByEmail(string $email) Return the first Admins filtered by the email column
 * @method     Admins findOneByRole(int $role) Return the first Admins filtered by the role column
 *
 * @method     array findById(int $id) Return Admins objects filtered by the id column
 * @method     array findByUsername(string $username) Return Admins objects filtered by the username column
 * @method     array findByPassword(string $password) Return Admins objects filtered by the password column
 * @method     array findByEmail(string $email) Return Admins objects filtered by the email column
 * @method     array findByRole(int $role) Return Admins objects filtered by the role column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseAdminsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAdminsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'Admins', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AdminsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AdminsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AdminsQuery) {
			return $criteria;
		}
		$query = new AdminsQuery();
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
	 * @return    Admins|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AdminsPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AdminsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AdminsPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AdminsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the username column
	 * 
	 * @param     string $username The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByUsername($username = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($username)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $username)) {
				$username = str_replace('*', '%', $username);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminsPeer::USERNAME, $username, $comparison);
	}

	/**
	 * Filter the query on the password column
	 * 
	 * @param     string $password The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByPassword($password = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($password)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $password)) {
				$password = str_replace('*', '%', $password);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminsPeer::PASSWORD, $password, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(AdminsPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the role column
	 * 
	 * @param     int|array $role The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByRole($role = null, $comparison = null)
	{
		if (is_array($role)) {
			$useMinMax = false;
			if (isset($role['min'])) {
				$this->addUsingAlias(AdminsPeer::ROLE, $role['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($role['max'])) {
				$this->addUsingAlias(AdminsPeer::ROLE, $role['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AdminsPeer::ROLE, $role, $comparison);
	}

	/**
	 * Filter the query by a related AclRoles object
	 *
	 * @param     AclRoles $aclRoles  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByAclRoles($aclRoles, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminsPeer::ROLE, $aclRoles->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AclRoles relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminsQuery The current query, for fluid interface
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
	 * Filter the query by a related JournalPost object
	 *
	 * @param     JournalPost $journalPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByJournalPostRelatedByCreatorUserId($journalPost, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminsPeer::ID, $journalPost->getCreatorUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the JournalPostRelatedByCreatorUserId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function joinJournalPostRelatedByCreatorUserId($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('JournalPostRelatedByCreatorUserId');
		
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
			$this->addJoinObject($join, 'JournalPostRelatedByCreatorUserId');
		}
		
		return $this;
	}

	/**
	 * Use the JournalPostRelatedByCreatorUserId relation JournalPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalPostQuery A secondary query class using the current class as primary query
	 */
	public function useJournalPostRelatedByCreatorUserIdQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinJournalPostRelatedByCreatorUserId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'JournalPostRelatedByCreatorUserId', 'JournalPostQuery');
	}

	/**
	 * Filter the query by a related JournalPost object
	 *
	 * @param     JournalPost $journalPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function filterByJournalPostRelatedByEditorUserId($journalPost, $comparison = null)
	{
		return $this
			->addUsingAlias(AdminsPeer::ID, $journalPost->getEditorUserId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the JournalPostRelatedByEditorUserId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function joinJournalPostRelatedByEditorUserId($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('JournalPostRelatedByEditorUserId');
		
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
			$this->addJoinObject($join, 'JournalPostRelatedByEditorUserId');
		}
		
		return $this;
	}

	/**
	 * Use the JournalPostRelatedByEditorUserId relation JournalPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalPostQuery A secondary query class using the current class as primary query
	 */
	public function useJournalPostRelatedByEditorUserIdQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinJournalPostRelatedByEditorUserId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'JournalPostRelatedByEditorUserId', 'JournalPostQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Admins $admins Object to remove from the list of results
	 *
	 * @return    AdminsQuery The current query, for fluid interface
	 */
	public function prune($admins = null)
	{
		if ($admins) {
			$this->addUsingAlias(AdminsPeer::ID, $admins->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAdminsQuery
