<?php


/**
 * Base class that represents a query for the 'mp_version' table.
 *
 * 
 *
 * @method     MpVersionQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     MpVersionQuery orderByVersion($order = Criteria::ASC) Order by the version column
 *
 * @method     MpVersionQuery groupById() Group by the id column
 * @method     MpVersionQuery groupByVersion() Group by the version column
 *
 * @method     MpVersionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     MpVersionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     MpVersionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     MpVersion findOne(PropelPDO $con = null) Return the first MpVersion matching the query
 * @method     MpVersion findOneOrCreate(PropelPDO $con = null) Return the first MpVersion matching the query, or a new MpVersion object populated from the query conditions when no match is found
 *
 * @method     MpVersion findOneById(int $id) Return the first MpVersion filtered by the id column
 * @method     MpVersion findOneByVersion(string $version) Return the first MpVersion filtered by the version column
 *
 * @method     array findById(int $id) Return MpVersion objects filtered by the id column
 * @method     array findByVersion(string $version) Return MpVersion objects filtered by the version column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseMpVersionQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseMpVersionQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'MpVersion', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new MpVersionQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    MpVersionQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof MpVersionQuery) {
			return $criteria;
		}
		$query = new MpVersionQuery();
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
	 * @return    MpVersion|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = MpVersionPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    MpVersionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(MpVersionPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    MpVersionQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(MpVersionPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MpVersionQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(MpVersionPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the version column
	 * 
	 * @param     string $version The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    MpVersionQuery The current query, for fluid interface
	 */
	public function filterByVersion($version = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($version)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $version)) {
				$version = str_replace('*', '%', $version);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(MpVersionPeer::VERSION, $version, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     MpVersion $mpVersion Object to remove from the list of results
	 *
	 * @return    MpVersionQuery The current query, for fluid interface
	 */
	public function prune($mpVersion = null)
	{
		if ($mpVersion) {
			$this->addUsingAlias(MpVersionPeer::ID, $mpVersion->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseMpVersionQuery
