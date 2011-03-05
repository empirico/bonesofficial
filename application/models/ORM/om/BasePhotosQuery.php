<?php


/**
 * Base class that represents a query for the 'photos' table.
 *
 * 
 *
 * @method     PhotosQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PhotosQuery orderByAlbumId($order = Criteria::ASC) Order by the album_id column
 * @method     PhotosQuery orderByFileId($order = Criteria::ASC) Order by the file_id column
 *
 * @method     PhotosQuery groupById() Group by the id column
 * @method     PhotosQuery groupByAlbumId() Group by the album_id column
 * @method     PhotosQuery groupByFileId() Group by the file_id column
 *
 * @method     PhotosQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PhotosQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PhotosQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PhotosQuery leftJoinAlbum($relationAlias = '') Adds a LEFT JOIN clause to the query using the Album relation
 * @method     PhotosQuery rightJoinAlbum($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Album relation
 * @method     PhotosQuery innerJoinAlbum($relationAlias = '') Adds a INNER JOIN clause to the query using the Album relation
 *
 * @method     PhotosQuery leftJoinFiles($relationAlias = '') Adds a LEFT JOIN clause to the query using the Files relation
 * @method     PhotosQuery rightJoinFiles($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Files relation
 * @method     PhotosQuery innerJoinFiles($relationAlias = '') Adds a INNER JOIN clause to the query using the Files relation
 *
 * @method     Photos findOne(PropelPDO $con = null) Return the first Photos matching the query
 * @method     Photos findOneOrCreate(PropelPDO $con = null) Return the first Photos matching the query, or a new Photos object populated from the query conditions when no match is found
 *
 * @method     Photos findOneById(int $id) Return the first Photos filtered by the id column
 * @method     Photos findOneByAlbumId(int $album_id) Return the first Photos filtered by the album_id column
 * @method     Photos findOneByFileId(int $file_id) Return the first Photos filtered by the file_id column
 *
 * @method     array findById(int $id) Return Photos objects filtered by the id column
 * @method     array findByAlbumId(int $album_id) Return Photos objects filtered by the album_id column
 * @method     array findByFileId(int $file_id) Return Photos objects filtered by the file_id column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BasePhotosQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePhotosQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'Photos', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PhotosQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PhotosQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PhotosQuery) {
			return $criteria;
		}
		$query = new PhotosQuery();
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
	 * @return    Photos|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PhotosPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PhotosPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PhotosPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PhotosPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the album_id column
	 * 
	 * @param     int|array $albumId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function filterByAlbumId($albumId = null, $comparison = null)
	{
		if (is_array($albumId)) {
			$useMinMax = false;
			if (isset($albumId['min'])) {
				$this->addUsingAlias(PhotosPeer::ALBUM_ID, $albumId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($albumId['max'])) {
				$this->addUsingAlias(PhotosPeer::ALBUM_ID, $albumId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhotosPeer::ALBUM_ID, $albumId, $comparison);
	}

	/**
	 * Filter the query on the file_id column
	 * 
	 * @param     int|array $fileId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function filterByFileId($fileId = null, $comparison = null)
	{
		if (is_array($fileId)) {
			$useMinMax = false;
			if (isset($fileId['min'])) {
				$this->addUsingAlias(PhotosPeer::FILE_ID, $fileId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fileId['max'])) {
				$this->addUsingAlias(PhotosPeer::FILE_ID, $fileId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PhotosPeer::FILE_ID, $fileId, $comparison);
	}

	/**
	 * Filter the query by a related Album object
	 *
	 * @param     Album $album  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function filterByAlbum($album, $comparison = null)
	{
		return $this
			->addUsingAlias(PhotosPeer::ALBUM_ID, $album->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Album relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotosQuery The current query, for fluid interface
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
	 * Filter the query by a related Files object
	 *
	 * @param     Files $files  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function filterByFiles($files, $comparison = null)
	{
		return $this
			->addUsingAlias(PhotosPeer::FILE_ID, $files->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Files relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function joinFiles($relationAlias = '', $joinType = Criteria::INNER_JOIN)
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
	public function useFilesQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinFiles($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Files', 'FilesQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Photos $photos Object to remove from the list of results
	 *
	 * @return    PhotosQuery The current query, for fluid interface
	 */
	public function prune($photos = null)
	{
		if ($photos) {
			$this->addUsingAlias(PhotosPeer::ID, $photos->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePhotosQuery
