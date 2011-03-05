<?php


/**
 * Base class that represents a query for the 'files_tracker' table.
 *
 * 
 *
 * @method     FilesTrackerQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FilesTrackerQuery orderByRefererUrl($order = Criteria::ASC) Order by the referer_url column
 * @method     FilesTrackerQuery orderByIpAddess($order = Criteria::ASC) Order by the ip_addess column
 * @method     FilesTrackerQuery orderByFilename($order = Criteria::ASC) Order by the fileName column
 * @method     FilesTrackerQuery orderByDownloadedTime($order = Criteria::ASC) Order by the downloaded_time column
 *
 * @method     FilesTrackerQuery groupById() Group by the id column
 * @method     FilesTrackerQuery groupByRefererUrl() Group by the referer_url column
 * @method     FilesTrackerQuery groupByIpAddess() Group by the ip_addess column
 * @method     FilesTrackerQuery groupByFilename() Group by the fileName column
 * @method     FilesTrackerQuery groupByDownloadedTime() Group by the downloaded_time column
 *
 * @method     FilesTrackerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FilesTrackerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FilesTrackerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FilesTracker findOne(PropelPDO $con = null) Return the first FilesTracker matching the query
 * @method     FilesTracker findOneOrCreate(PropelPDO $con = null) Return the first FilesTracker matching the query, or a new FilesTracker object populated from the query conditions when no match is found
 *
 * @method     FilesTracker findOneById(int $id) Return the first FilesTracker filtered by the id column
 * @method     FilesTracker findOneByRefererUrl(string $referer_url) Return the first FilesTracker filtered by the referer_url column
 * @method     FilesTracker findOneByIpAddess(string $ip_addess) Return the first FilesTracker filtered by the ip_addess column
 * @method     FilesTracker findOneByFilename(string $fileName) Return the first FilesTracker filtered by the fileName column
 * @method     FilesTracker findOneByDownloadedTime(string $downloaded_time) Return the first FilesTracker filtered by the downloaded_time column
 *
 * @method     array findById(int $id) Return FilesTracker objects filtered by the id column
 * @method     array findByRefererUrl(string $referer_url) Return FilesTracker objects filtered by the referer_url column
 * @method     array findByIpAddess(string $ip_addess) Return FilesTracker objects filtered by the ip_addess column
 * @method     array findByFilename(string $fileName) Return FilesTracker objects filtered by the fileName column
 * @method     array findByDownloadedTime(string $downloaded_time) Return FilesTracker objects filtered by the downloaded_time column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseFilesTrackerQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseFilesTrackerQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'FilesTracker', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FilesTrackerQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FilesTrackerQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FilesTrackerQuery) {
			return $criteria;
		}
		$query = new FilesTrackerQuery();
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
	 * @return    FilesTracker|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = FilesTrackerPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    FilesTrackerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FilesTrackerPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FilesTrackerQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FilesTrackerPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesTrackerQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FilesTrackerPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the referer_url column
	 * 
	 * @param     string $refererUrl The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesTrackerQuery The current query, for fluid interface
	 */
	public function filterByRefererUrl($refererUrl = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($refererUrl)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $refererUrl)) {
				$refererUrl = str_replace('*', '%', $refererUrl);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FilesTrackerPeer::REFERER_URL, $refererUrl, $comparison);
	}

	/**
	 * Filter the query on the ip_addess column
	 * 
	 * @param     string $ipAddess The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesTrackerQuery The current query, for fluid interface
	 */
	public function filterByIpAddess($ipAddess = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ipAddess)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ipAddess)) {
				$ipAddess = str_replace('*', '%', $ipAddess);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FilesTrackerPeer::IP_ADDESS, $ipAddess, $comparison);
	}

	/**
	 * Filter the query on the fileName column
	 * 
	 * @param     string $filename The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesTrackerQuery The current query, for fluid interface
	 */
	public function filterByFilename($filename = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($filename)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $filename)) {
				$filename = str_replace('*', '%', $filename);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FilesTrackerPeer::FILENAME, $filename, $comparison);
	}

	/**
	 * Filter the query on the downloaded_time column
	 * 
	 * @param     string|array $downloadedTime The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesTrackerQuery The current query, for fluid interface
	 */
	public function filterByDownloadedTime($downloadedTime = null, $comparison = null)
	{
		if (is_array($downloadedTime)) {
			$useMinMax = false;
			if (isset($downloadedTime['min'])) {
				$this->addUsingAlias(FilesTrackerPeer::DOWNLOADED_TIME, $downloadedTime['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($downloadedTime['max'])) {
				$this->addUsingAlias(FilesTrackerPeer::DOWNLOADED_TIME, $downloadedTime['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FilesTrackerPeer::DOWNLOADED_TIME, $downloadedTime, $comparison);
	}

	/**
	 * Exclude object from result
	 *
	 * @param     FilesTracker $filesTracker Object to remove from the list of results
	 *
	 * @return    FilesTrackerQuery The current query, for fluid interface
	 */
	public function prune($filesTracker = null)
	{
		if ($filesTracker) {
			$this->addUsingAlias(FilesTrackerPeer::ID, $filesTracker->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseFilesTrackerQuery
