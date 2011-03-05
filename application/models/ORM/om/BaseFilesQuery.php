<?php


/**
 * Base class that represents a query for the 'files' table.
 *
 * 
 *
 * @method     FilesQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FilesQuery orderByFilename($order = Criteria::ASC) Order by the filename column
 * @method     FilesQuery orderByMimetype($order = Criteria::ASC) Order by the mimetype column
 * @method     FilesQuery orderBySize($order = Criteria::ASC) Order by the size column
 *
 * @method     FilesQuery groupById() Group by the id column
 * @method     FilesQuery groupByFilename() Group by the filename column
 * @method     FilesQuery groupByMimetype() Group by the mimetype column
 * @method     FilesQuery groupBySize() Group by the size column
 *
 * @method     FilesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FilesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FilesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FilesQuery leftJoinEvents($relationAlias = '') Adds a LEFT JOIN clause to the query using the Events relation
 * @method     FilesQuery rightJoinEvents($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Events relation
 * @method     FilesQuery innerJoinEvents($relationAlias = '') Adds a INNER JOIN clause to the query using the Events relation
 *
 * @method     FilesQuery leftJoinJournalPost($relationAlias = '') Adds a LEFT JOIN clause to the query using the JournalPost relation
 * @method     FilesQuery rightJoinJournalPost($relationAlias = '') Adds a RIGHT JOIN clause to the query using the JournalPost relation
 * @method     FilesQuery innerJoinJournalPost($relationAlias = '') Adds a INNER JOIN clause to the query using the JournalPost relation
 *
 * @method     FilesQuery leftJoinPhotos($relationAlias = '') Adds a LEFT JOIN clause to the query using the Photos relation
 * @method     FilesQuery rightJoinPhotos($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Photos relation
 * @method     FilesQuery innerJoinPhotos($relationAlias = '') Adds a INNER JOIN clause to the query using the Photos relation
 *
 * @method     Files findOne(PropelPDO $con = null) Return the first Files matching the query
 * @method     Files findOneOrCreate(PropelPDO $con = null) Return the first Files matching the query, or a new Files object populated from the query conditions when no match is found
 *
 * @method     Files findOneById(int $id) Return the first Files filtered by the id column
 * @method     Files findOneByFilename(string $filename) Return the first Files filtered by the filename column
 * @method     Files findOneByMimetype(string $mimetype) Return the first Files filtered by the mimetype column
 * @method     Files findOneBySize(int $size) Return the first Files filtered by the size column
 *
 * @method     array findById(int $id) Return Files objects filtered by the id column
 * @method     array findByFilename(string $filename) Return Files objects filtered by the filename column
 * @method     array findByMimetype(string $mimetype) Return Files objects filtered by the mimetype column
 * @method     array findBySize(int $size) Return Files objects filtered by the size column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseFilesQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseFilesQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'Files', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FilesQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FilesQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FilesQuery) {
			return $criteria;
		}
		$query = new FilesQuery();
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
	 * @return    Files|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = FilesPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FilesPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FilesPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FilesPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the filename column
	 * 
	 * @param     string $filename The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesQuery The current query, for fluid interface
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
		return $this->addUsingAlias(FilesPeer::FILENAME, $filename, $comparison);
	}

	/**
	 * Filter the query on the mimetype column
	 * 
	 * @param     string $mimetype The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function filterByMimetype($mimetype = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($mimetype)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $mimetype)) {
				$mimetype = str_replace('*', '%', $mimetype);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FilesPeer::MIMETYPE, $mimetype, $comparison);
	}

	/**
	 * Filter the query on the size column
	 * 
	 * @param     int|array $size The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function filterBySize($size = null, $comparison = null)
	{
		if (is_array($size)) {
			$useMinMax = false;
			if (isset($size['min'])) {
				$this->addUsingAlias(FilesPeer::SIZE, $size['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($size['max'])) {
				$this->addUsingAlias(FilesPeer::SIZE, $size['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FilesPeer::SIZE, $size, $comparison);
	}

	/**
	 * Filter the query by a related Events object
	 *
	 * @param     Events $events  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function filterByEvents($events, $comparison = null)
	{
		return $this
			->addUsingAlias(FilesPeer::ID, $events->getImageId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Events relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function joinEvents($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Events');
		
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
			$this->addJoinObject($join, 'Events');
		}
		
		return $this;
	}

	/**
	 * Use the Events relation Events object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EventsQuery A secondary query class using the current class as primary query
	 */
	public function useEventsQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinEvents($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Events', 'EventsQuery');
	}

	/**
	 * Filter the query by a related JournalPost object
	 *
	 * @param     JournalPost $journalPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function filterByJournalPost($journalPost, $comparison = null)
	{
		return $this
			->addUsingAlias(FilesPeer::ID, $journalPost->getFileId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the JournalPost relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function joinJournalPost($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('JournalPost');
		
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
			$this->addJoinObject($join, 'JournalPost');
		}
		
		return $this;
	}

	/**
	 * Use the JournalPost relation JournalPost object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalPostQuery A secondary query class using the current class as primary query
	 */
	public function useJournalPostQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinJournalPost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'JournalPost', 'JournalPostQuery');
	}

	/**
	 * Filter the query by a related Photos object
	 *
	 * @param     Photos $photos  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function filterByPhotos($photos, $comparison = null)
	{
		return $this
			->addUsingAlias(FilesPeer::ID, $photos->getFileId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Photos relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function joinPhotos($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Photos');
		
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
			$this->addJoinObject($join, 'Photos');
		}
		
		return $this;
	}

	/**
	 * Use the Photos relation Photos object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotosQuery A secondary query class using the current class as primary query
	 */
	public function usePhotosQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinPhotos($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Photos', 'PhotosQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Files $files Object to remove from the list of results
	 *
	 * @return    FilesQuery The current query, for fluid interface
	 */
	public function prune($files = null)
	{
		if ($files) {
			$this->addUsingAlias(FilesPeer::ID, $files->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseFilesQuery
