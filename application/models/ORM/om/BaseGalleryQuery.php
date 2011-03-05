<?php


/**
 * Base class that represents a query for the 'gallery' table.
 *
 * 
 *
 * @method     GalleryQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     GalleryQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     GalleryQuery orderByTitleSlug($order = Criteria::ASC) Order by the title_slug column
 * @method     GalleryQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     GalleryQuery orderByCreated($order = Criteria::ASC) Order by the created column
 *
 * @method     GalleryQuery groupById() Group by the id column
 * @method     GalleryQuery groupByTitle() Group by the title column
 * @method     GalleryQuery groupByTitleSlug() Group by the title_slug column
 * @method     GalleryQuery groupByDescription() Group by the description column
 * @method     GalleryQuery groupByCreated() Group by the created column
 *
 * @method     GalleryQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     GalleryQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     GalleryQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     GalleryQuery leftJoinAlbum($relationAlias = '') Adds a LEFT JOIN clause to the query using the Album relation
 * @method     GalleryQuery rightJoinAlbum($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Album relation
 * @method     GalleryQuery innerJoinAlbum($relationAlias = '') Adds a INNER JOIN clause to the query using the Album relation
 *
 * @method     Gallery findOne(PropelPDO $con = null) Return the first Gallery matching the query
 * @method     Gallery findOneOrCreate(PropelPDO $con = null) Return the first Gallery matching the query, or a new Gallery object populated from the query conditions when no match is found
 *
 * @method     Gallery findOneById(int $id) Return the first Gallery filtered by the id column
 * @method     Gallery findOneByTitle(string $title) Return the first Gallery filtered by the title column
 * @method     Gallery findOneByTitleSlug(string $title_slug) Return the first Gallery filtered by the title_slug column
 * @method     Gallery findOneByDescription(string $description) Return the first Gallery filtered by the description column
 * @method     Gallery findOneByCreated(string $created) Return the first Gallery filtered by the created column
 *
 * @method     array findById(int $id) Return Gallery objects filtered by the id column
 * @method     array findByTitle(string $title) Return Gallery objects filtered by the title column
 * @method     array findByTitleSlug(string $title_slug) Return Gallery objects filtered by the title_slug column
 * @method     array findByDescription(string $description) Return Gallery objects filtered by the description column
 * @method     array findByCreated(string $created) Return Gallery objects filtered by the created column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseGalleryQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseGalleryQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'Gallery', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new GalleryQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    GalleryQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof GalleryQuery) {
			return $criteria;
		}
		$query = new GalleryQuery();
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
	 * @return    Gallery|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = GalleryPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(GalleryPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(GalleryPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(GalleryPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GalleryQuery The current query, for fluid interface
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
		return $this->addUsingAlias(GalleryPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the title_slug column
	 * 
	 * @param     string $titleSlug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function filterByTitleSlug($titleSlug = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($titleSlug)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $titleSlug)) {
				$titleSlug = str_replace('*', '%', $titleSlug);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GalleryPeer::TITLE_SLUG, $titleSlug, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(GalleryPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     string|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(GalleryPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(GalleryPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(GalleryPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query by a related Album object
	 *
	 * @param     Album $album  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function filterByAlbum($album, $comparison = null)
	{
		return $this
			->addUsingAlias(GalleryPeer::ID, $album->getGalleryId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Album relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function joinAlbum($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Album');
		
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
			$this->addJoinObject($join, 'Album');
		}
		
		return $this;
	}

	/**
	 * Use the Album relation Album object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery A secondary query class using the current class as primary query
	 */
	public function useAlbumQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinAlbum($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Album', 'AlbumQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Gallery $gallery Object to remove from the list of results
	 *
	 * @return    GalleryQuery The current query, for fluid interface
	 */
	public function prune($gallery = null)
	{
		if ($gallery) {
			$this->addUsingAlias(GalleryPeer::ID, $gallery->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseGalleryQuery
