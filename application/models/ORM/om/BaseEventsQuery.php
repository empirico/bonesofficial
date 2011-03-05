<?php


/**
 * Base class that represents a query for the 'events' table.
 *
 * 
 *
 * @method     EventsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EventsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     EventsQuery orderByVenue($order = Criteria::ASC) Order by the venue column
 * @method     EventsQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     EventsQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     EventsQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     EventsQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     EventsQuery orderByImageId($order = Criteria::ASC) Order by the image_id column
 * @method     EventsQuery orderByIsPublic($order = Criteria::ASC) Order by the is_public column
 * @method     EventsQuery orderByEventType($order = Criteria::ASC) Order by the event_type column
 * @method     EventsQuery orderByFacebookId($order = Criteria::ASC) Order by the facebook_id column
 *
 * @method     EventsQuery groupById() Group by the id column
 * @method     EventsQuery groupByTitle() Group by the title column
 * @method     EventsQuery groupByVenue() Group by the venue column
 * @method     EventsQuery groupByAddress() Group by the address column
 * @method     EventsQuery groupByCreated() Group by the created column
 * @method     EventsQuery groupByStartDate() Group by the start_date column
 * @method     EventsQuery groupByEndDate() Group by the end_date column
 * @method     EventsQuery groupByImageId() Group by the image_id column
 * @method     EventsQuery groupByIsPublic() Group by the is_public column
 * @method     EventsQuery groupByEventType() Group by the event_type column
 * @method     EventsQuery groupByFacebookId() Group by the facebook_id column
 *
 * @method     EventsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EventsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EventsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EventsQuery leftJoinFiles($relationAlias = '') Adds a LEFT JOIN clause to the query using the Files relation
 * @method     EventsQuery rightJoinFiles($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Files relation
 * @method     EventsQuery innerJoinFiles($relationAlias = '') Adds a INNER JOIN clause to the query using the Files relation
 *
 * @method     Events findOne(PropelPDO $con = null) Return the first Events matching the query
 * @method     Events findOneOrCreate(PropelPDO $con = null) Return the first Events matching the query, or a new Events object populated from the query conditions when no match is found
 *
 * @method     Events findOneById(int $id) Return the first Events filtered by the id column
 * @method     Events findOneByTitle(string $title) Return the first Events filtered by the title column
 * @method     Events findOneByVenue(string $venue) Return the first Events filtered by the venue column
 * @method     Events findOneByAddress(string $address) Return the first Events filtered by the address column
 * @method     Events findOneByCreated(string $created) Return the first Events filtered by the created column
 * @method     Events findOneByStartDate(string $start_date) Return the first Events filtered by the start_date column
 * @method     Events findOneByEndDate(string $end_date) Return the first Events filtered by the end_date column
 * @method     Events findOneByImageId(int $image_id) Return the first Events filtered by the image_id column
 * @method     Events findOneByIsPublic(int $is_public) Return the first Events filtered by the is_public column
 * @method     Events findOneByEventType(string $event_type) Return the first Events filtered by the event_type column
 * @method     Events findOneByFacebookId(string $facebook_id) Return the first Events filtered by the facebook_id column
 *
 * @method     array findById(int $id) Return Events objects filtered by the id column
 * @method     array findByTitle(string $title) Return Events objects filtered by the title column
 * @method     array findByVenue(string $venue) Return Events objects filtered by the venue column
 * @method     array findByAddress(string $address) Return Events objects filtered by the address column
 * @method     array findByCreated(string $created) Return Events objects filtered by the created column
 * @method     array findByStartDate(string $start_date) Return Events objects filtered by the start_date column
 * @method     array findByEndDate(string $end_date) Return Events objects filtered by the end_date column
 * @method     array findByImageId(int $image_id) Return Events objects filtered by the image_id column
 * @method     array findByIsPublic(int $is_public) Return Events objects filtered by the is_public column
 * @method     array findByEventType(string $event_type) Return Events objects filtered by the event_type column
 * @method     array findByFacebookId(string $facebook_id) Return Events objects filtered by the facebook_id column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseEventsQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseEventsQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'Events', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EventsQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EventsQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EventsQuery) {
			return $criteria;
		}
		$query = new EventsQuery();
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
	 * @return    Events|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = EventsPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EventsPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EventsPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EventsPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByTitle($title = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($title)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $title)) {
				$title = str_replace('*', '%', $title);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EventsPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the venue column
	 * 
	 * @param     string $venue The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByVenue($venue = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($venue)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $venue)) {
				$venue = str_replace('*', '%', $venue);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EventsPeer::VENUE, $venue, $comparison);
	}

	/**
	 * Filter the query on the address column
	 * 
	 * @param     string $address The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByAddress($address = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($address)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $address)) {
				$address = str_replace('*', '%', $address);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EventsPeer::ADDRESS, $address, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     string|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(EventsPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(EventsPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventsPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the start_date column
	 * 
	 * @param     string|array $startDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByStartDate($startDate = null, $comparison = null)
	{
		if (is_array($startDate)) {
			$useMinMax = false;
			if (isset($startDate['min'])) {
				$this->addUsingAlias(EventsPeer::START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startDate['max'])) {
				$this->addUsingAlias(EventsPeer::START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventsPeer::START_DATE, $startDate, $comparison);
	}

	/**
	 * Filter the query on the end_date column
	 * 
	 * @param     string|array $endDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByEndDate($endDate = null, $comparison = null)
	{
		if (is_array($endDate)) {
			$useMinMax = false;
			if (isset($endDate['min'])) {
				$this->addUsingAlias(EventsPeer::END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($endDate['max'])) {
				$this->addUsingAlias(EventsPeer::END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventsPeer::END_DATE, $endDate, $comparison);
	}

	/**
	 * Filter the query on the image_id column
	 * 
	 * @param     int|array $imageId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByImageId($imageId = null, $comparison = null)
	{
		if (is_array($imageId)) {
			$useMinMax = false;
			if (isset($imageId['min'])) {
				$this->addUsingAlias(EventsPeer::IMAGE_ID, $imageId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($imageId['max'])) {
				$this->addUsingAlias(EventsPeer::IMAGE_ID, $imageId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventsPeer::IMAGE_ID, $imageId, $comparison);
	}

	/**
	 * Filter the query on the is_public column
	 * 
	 * @param     int|array $isPublic The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByIsPublic($isPublic = null, $comparison = null)
	{
		if (is_array($isPublic)) {
			$useMinMax = false;
			if (isset($isPublic['min'])) {
				$this->addUsingAlias(EventsPeer::IS_PUBLIC, $isPublic['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isPublic['max'])) {
				$this->addUsingAlias(EventsPeer::IS_PUBLIC, $isPublic['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EventsPeer::IS_PUBLIC, $isPublic, $comparison);
	}

	/**
	 * Filter the query on the event_type column
	 * 
	 * @param     string $eventType The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByEventType($eventType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($eventType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $eventType)) {
				$eventType = str_replace('*', '%', $eventType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EventsPeer::EVENT_TYPE, $eventType, $comparison);
	}

	/**
	 * Filter the query on the facebook_id column
	 * 
	 * @param     string $facebookId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByFacebookId($facebookId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($facebookId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $facebookId)) {
				$facebookId = str_replace('*', '%', $facebookId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EventsPeer::FACEBOOK_ID, $facebookId, $comparison);
	}

	/**
	 * Filter the query by a related Files object
	 *
	 * @param     Files $files  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function filterByFiles($files, $comparison = null)
	{
		return $this
			->addUsingAlias(EventsPeer::IMAGE_ID, $files->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Files relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function joinFiles($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Files');
		
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
			$this->addJoinObject($join, 'Files');
		}
		
		return $this;
	}

	/**
	 * Use the Files relation Files object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FilesQuery A secondary query class using the current class as primary query
	 */
	public function useFilesQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinFiles($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Files', 'FilesQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Events $events Object to remove from the list of results
	 *
	 * @return    EventsQuery The current query, for fluid interface
	 */
	public function prune($events = null)
	{
		if ($events) {
			$this->addUsingAlias(EventsPeer::ID, $events->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseEventsQuery
