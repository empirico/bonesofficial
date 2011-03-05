<?php


/**
 * Base class that represents a query for the 'album' table.
 *
 * 
 *
 * @method     AlbumQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     AlbumQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     AlbumQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     AlbumQuery orderByGalleryId($order = Criteria::ASC) Order by the gallery_id column
 * @method     AlbumQuery orderByCoverPhotoId($order = Criteria::ASC) Order by the cover_photo_id column
 * @method     AlbumQuery orderByRank($order = Criteria::ASC) Order by the rank column
 * @method     AlbumQuery orderByIsPublic($order = Criteria::ASC) Order by the is_public column
 * @method     AlbumQuery orderByMaxWidth($order = Criteria::ASC) Order by the max_width column
 * @method     AlbumQuery orderByMaxHeight($order = Criteria::ASC) Order by the max_height column
 *
 * @method     AlbumQuery groupById() Group by the id column
 * @method     AlbumQuery groupByTitle() Group by the title column
 * @method     AlbumQuery groupByDescription() Group by the description column
 * @method     AlbumQuery groupByGalleryId() Group by the gallery_id column
 * @method     AlbumQuery groupByCoverPhotoId() Group by the cover_photo_id column
 * @method     AlbumQuery groupByRank() Group by the rank column
 * @method     AlbumQuery groupByIsPublic() Group by the is_public column
 * @method     AlbumQuery groupByMaxWidth() Group by the max_width column
 * @method     AlbumQuery groupByMaxHeight() Group by the max_height column
 *
 * @method     AlbumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     AlbumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     AlbumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     AlbumQuery leftJoinGallery($relationAlias = '') Adds a LEFT JOIN clause to the query using the Gallery relation
 * @method     AlbumQuery rightJoinGallery($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Gallery relation
 * @method     AlbumQuery innerJoinGallery($relationAlias = '') Adds a INNER JOIN clause to the query using the Gallery relation
 *
 * @method     AlbumQuery leftJoinPhotos($relationAlias = '') Adds a LEFT JOIN clause to the query using the Photos relation
 * @method     AlbumQuery rightJoinPhotos($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Photos relation
 * @method     AlbumQuery innerJoinPhotos($relationAlias = '') Adds a INNER JOIN clause to the query using the Photos relation
 *
 * @method     Album findOne(PropelPDO $con = null) Return the first Album matching the query
 * @method     Album findOneOrCreate(PropelPDO $con = null) Return the first Album matching the query, or a new Album object populated from the query conditions when no match is found
 *
 * @method     Album findOneById(int $id) Return the first Album filtered by the id column
 * @method     Album findOneByTitle(string $title) Return the first Album filtered by the title column
 * @method     Album findOneByDescription(string $description) Return the first Album filtered by the description column
 * @method     Album findOneByGalleryId(int $gallery_id) Return the first Album filtered by the gallery_id column
 * @method     Album findOneByCoverPhotoId(int $cover_photo_id) Return the first Album filtered by the cover_photo_id column
 * @method     Album findOneByRank(int $rank) Return the first Album filtered by the rank column
 * @method     Album findOneByIsPublic(int $is_public) Return the first Album filtered by the is_public column
 * @method     Album findOneByMaxWidth(int $max_width) Return the first Album filtered by the max_width column
 * @method     Album findOneByMaxHeight(int $max_height) Return the first Album filtered by the max_height column
 *
 * @method     array findById(int $id) Return Album objects filtered by the id column
 * @method     array findByTitle(string $title) Return Album objects filtered by the title column
 * @method     array findByDescription(string $description) Return Album objects filtered by the description column
 * @method     array findByGalleryId(int $gallery_id) Return Album objects filtered by the gallery_id column
 * @method     array findByCoverPhotoId(int $cover_photo_id) Return Album objects filtered by the cover_photo_id column
 * @method     array findByRank(int $rank) Return Album objects filtered by the rank column
 * @method     array findByIsPublic(int $is_public) Return Album objects filtered by the is_public column
 * @method     array findByMaxWidth(int $max_width) Return Album objects filtered by the max_width column
 * @method     array findByMaxHeight(int $max_height) Return Album objects filtered by the max_height column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseAlbumQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseAlbumQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'Album', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new AlbumQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    AlbumQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof AlbumQuery) {
			return $criteria;
		}
		$query = new AlbumQuery();
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
	 * @return    Album|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = AlbumPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(AlbumPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(AlbumPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(AlbumPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AlbumPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
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
		return $this->addUsingAlias(AlbumPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the gallery_id column
	 * 
	 * @param     int|array $galleryId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByGalleryId($galleryId = null, $comparison = null)
	{
		if (is_array($galleryId)) {
			$useMinMax = false;
			if (isset($galleryId['min'])) {
				$this->addUsingAlias(AlbumPeer::GALLERY_ID, $galleryId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($galleryId['max'])) {
				$this->addUsingAlias(AlbumPeer::GALLERY_ID, $galleryId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::GALLERY_ID, $galleryId, $comparison);
	}

	/**
	 * Filter the query on the cover_photo_id column
	 * 
	 * @param     int|array $coverPhotoId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByCoverPhotoId($coverPhotoId = null, $comparison = null)
	{
		if (is_array($coverPhotoId)) {
			$useMinMax = false;
			if (isset($coverPhotoId['min'])) {
				$this->addUsingAlias(AlbumPeer::COVER_PHOTO_ID, $coverPhotoId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($coverPhotoId['max'])) {
				$this->addUsingAlias(AlbumPeer::COVER_PHOTO_ID, $coverPhotoId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::COVER_PHOTO_ID, $coverPhotoId, $comparison);
	}

	/**
	 * Filter the query on the rank column
	 * 
	 * @param     int|array $rank The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByRank($rank = null, $comparison = null)
	{
		if (is_array($rank)) {
			$useMinMax = false;
			if (isset($rank['min'])) {
				$this->addUsingAlias(AlbumPeer::RANK, $rank['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rank['max'])) {
				$this->addUsingAlias(AlbumPeer::RANK, $rank['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::RANK, $rank, $comparison);
	}

	/**
	 * Filter the query on the is_public column
	 * 
	 * @param     int|array $isPublic The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByIsPublic($isPublic = null, $comparison = null)
	{
		if (is_array($isPublic)) {
			$useMinMax = false;
			if (isset($isPublic['min'])) {
				$this->addUsingAlias(AlbumPeer::IS_PUBLIC, $isPublic['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isPublic['max'])) {
				$this->addUsingAlias(AlbumPeer::IS_PUBLIC, $isPublic['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::IS_PUBLIC, $isPublic, $comparison);
	}

	/**
	 * Filter the query on the max_width column
	 * 
	 * @param     int|array $maxWidth The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByMaxWidth($maxWidth = null, $comparison = null)
	{
		if (is_array($maxWidth)) {
			$useMinMax = false;
			if (isset($maxWidth['min'])) {
				$this->addUsingAlias(AlbumPeer::MAX_WIDTH, $maxWidth['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($maxWidth['max'])) {
				$this->addUsingAlias(AlbumPeer::MAX_WIDTH, $maxWidth['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::MAX_WIDTH, $maxWidth, $comparison);
	}

	/**
	 * Filter the query on the max_height column
	 * 
	 * @param     int|array $maxHeight The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByMaxHeight($maxHeight = null, $comparison = null)
	{
		if (is_array($maxHeight)) {
			$useMinMax = false;
			if (isset($maxHeight['min'])) {
				$this->addUsingAlias(AlbumPeer::MAX_HEIGHT, $maxHeight['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($maxHeight['max'])) {
				$this->addUsingAlias(AlbumPeer::MAX_HEIGHT, $maxHeight['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(AlbumPeer::MAX_HEIGHT, $maxHeight, $comparison);
	}

	/**
	 * Filter the query by a related Gallery object
	 *
	 * @param     Gallery $gallery  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByGallery($gallery, $comparison = null)
	{
		return $this
			->addUsingAlias(AlbumPeer::GALLERY_ID, $gallery->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Gallery relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function joinGallery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Gallery');
		
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
			$this->addJoinObject($join, 'Gallery');
		}
		
		return $this;
	}

	/**
	 * Use the Gallery relation Gallery object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    GalleryQuery A secondary query class using the current class as primary query
	 */
	public function useGalleryQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinGallery($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Gallery', 'GalleryQuery');
	}

	/**
	 * Filter the query by a related Photos object
	 *
	 * @param     Photos $photos  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function filterByPhotos($photos, $comparison = null)
	{
		return $this
			->addUsingAlias(AlbumPeer::ID, $photos->getAlbumId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Photos relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AlbumQuery The current query, for fluid interface
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
	 * @param     Album $album Object to remove from the list of results
	 *
	 * @return    AlbumQuery The current query, for fluid interface
	 */
	public function prune($album = null)
	{
		if ($album) {
			$this->addUsingAlias(AlbumPeer::ID, $album->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseAlbumQuery
