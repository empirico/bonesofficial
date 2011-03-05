<?php


/**
 * Base class that represents a query for the 'ip_to_country' table.
 *
 * 
 *
 * @method     IpToCountryQuery orderById($order = Criteria::ASC) Order by the ID column
 * @method     IpToCountryQuery orderByIpFrom($order = Criteria::ASC) Order by the ip_from column
 * @method     IpToCountryQuery orderByIpTo($order = Criteria::ASC) Order by the ip_to column
 * @method     IpToCountryQuery orderBySigla($order = Criteria::ASC) Order by the sigla column
 * @method     IpToCountryQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     IpToCountryQuery orderByCountry($order = Criteria::ASC) Order by the country column
 *
 * @method     IpToCountryQuery groupById() Group by the ID column
 * @method     IpToCountryQuery groupByIpFrom() Group by the ip_from column
 * @method     IpToCountryQuery groupByIpTo() Group by the ip_to column
 * @method     IpToCountryQuery groupBySigla() Group by the sigla column
 * @method     IpToCountryQuery groupByCode() Group by the code column
 * @method     IpToCountryQuery groupByCountry() Group by the country column
 *
 * @method     IpToCountryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     IpToCountryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     IpToCountryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     IpToCountry findOne(PropelPDO $con = null) Return the first IpToCountry matching the query
 * @method     IpToCountry findOneOrCreate(PropelPDO $con = null) Return the first IpToCountry matching the query, or a new IpToCountry object populated from the query conditions when no match is found
 *
 * @method     IpToCountry findOneById(int $ID) Return the first IpToCountry filtered by the ID column
 * @method     IpToCountry findOneByIpFrom(string $ip_from) Return the first IpToCountry filtered by the ip_from column
 * @method     IpToCountry findOneByIpTo(string $ip_to) Return the first IpToCountry filtered by the ip_to column
 * @method     IpToCountry findOneBySigla(string $sigla) Return the first IpToCountry filtered by the sigla column
 * @method     IpToCountry findOneByCode(string $code) Return the first IpToCountry filtered by the code column
 * @method     IpToCountry findOneByCountry(string $country) Return the first IpToCountry filtered by the country column
 *
 * @method     array findById(int $ID) Return IpToCountry objects filtered by the ID column
 * @method     array findByIpFrom(string $ip_from) Return IpToCountry objects filtered by the ip_from column
 * @method     array findByIpTo(string $ip_to) Return IpToCountry objects filtered by the ip_to column
 * @method     array findBySigla(string $sigla) Return IpToCountry objects filtered by the sigla column
 * @method     array findByCode(string $code) Return IpToCountry objects filtered by the code column
 * @method     array findByCountry(string $country) Return IpToCountry objects filtered by the country column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseIpToCountryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseIpToCountryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'IpToCountry', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new IpToCountryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    IpToCountryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof IpToCountryQuery) {
			return $criteria;
		}
		$query = new IpToCountryQuery();
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
	 * @return    IpToCountry|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = IpToCountryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(IpToCountryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(IpToCountryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the ID column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(IpToCountryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the ip_from column
	 * 
	 * @param     string $ipFrom The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function filterByIpFrom($ipFrom = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ipFrom)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ipFrom)) {
				$ipFrom = str_replace('*', '%', $ipFrom);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IpToCountryPeer::IP_FROM, $ipFrom, $comparison);
	}

	/**
	 * Filter the query on the ip_to column
	 * 
	 * @param     string $ipTo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function filterByIpTo($ipTo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ipTo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ipTo)) {
				$ipTo = str_replace('*', '%', $ipTo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IpToCountryPeer::IP_TO, $ipTo, $comparison);
	}

	/**
	 * Filter the query on the sigla column
	 * 
	 * @param     string $sigla The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function filterBySigla($sigla = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($sigla)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $sigla)) {
				$sigla = str_replace('*', '%', $sigla);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IpToCountryPeer::SIGLA, $sigla, $comparison);
	}

	/**
	 * Filter the query on the code column
	 * 
	 * @param     string $code The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function filterByCode($code = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($code)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $code)) {
				$code = str_replace('*', '%', $code);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IpToCountryPeer::CODE, $code, $comparison);
	}

	/**
	 * Filter the query on the country column
	 * 
	 * @param     string $country The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function filterByCountry($country = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($country)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $country)) {
				$country = str_replace('*', '%', $country);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(IpToCountryPeer::COUNTRY, $country, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     IpToCountry $ipToCountry Object to remove from the list of results
	 *
	 * @return    IpToCountryQuery The current query, for fluid interface
	 */
	public function prune($ipToCountry = null)
	{
		if ($ipToCountry) {
			$this->addUsingAlias(IpToCountryPeer::ID, $ipToCountry->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseIpToCountryQuery
