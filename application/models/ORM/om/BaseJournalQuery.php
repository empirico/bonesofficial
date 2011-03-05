<?php


/**
 * Base class that represents a query for the 'journal' table.
 *
 * 
 *
 * @method     JournalQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     JournalQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     JournalQuery orderByTitleSlug($order = Criteria::ASC) Order by the title_slug column
 * @method     JournalQuery orderByTextAbstract($order = Criteria::ASC) Order by the text_abstract column
 * @method     JournalQuery orderByShowTitle($order = Criteria::ASC) Order by the show_title column
 * @method     JournalQuery orderByShowAbstract($order = Criteria::ASC) Order by the show_abstract column
 * @method     JournalQuery orderByShowFulltext($order = Criteria::ASC) Order by the show_fulltext column
 * @method     JournalQuery orderByShowFileUpload($order = Criteria::ASC) Order by the show_file_upload column
 * @method     JournalQuery orderByPostOrderType($order = Criteria::ASC) Order by the post_order_type column
 *
 * @method     JournalQuery groupById() Group by the id column
 * @method     JournalQuery groupByTitle() Group by the title column
 * @method     JournalQuery groupByTitleSlug() Group by the title_slug column
 * @method     JournalQuery groupByTextAbstract() Group by the text_abstract column
 * @method     JournalQuery groupByShowTitle() Group by the show_title column
 * @method     JournalQuery groupByShowAbstract() Group by the show_abstract column
 * @method     JournalQuery groupByShowFulltext() Group by the show_fulltext column
 * @method     JournalQuery groupByShowFileUpload() Group by the show_file_upload column
 * @method     JournalQuery groupByPostOrderType() Group by the post_order_type column
 *
 * @method     JournalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     JournalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     JournalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     JournalQuery leftJoinJournalPost($relationAlias = '') Adds a LEFT JOIN clause to the query using the JournalPost relation
 * @method     JournalQuery rightJoinJournalPost($relationAlias = '') Adds a RIGHT JOIN clause to the query using the JournalPost relation
 * @method     JournalQuery innerJoinJournalPost($relationAlias = '') Adds a INNER JOIN clause to the query using the JournalPost relation
 *
 * @method     Journal findOne(PropelPDO $con = null) Return the first Journal matching the query
 * @method     Journal findOneOrCreate(PropelPDO $con = null) Return the first Journal matching the query, or a new Journal object populated from the query conditions when no match is found
 *
 * @method     Journal findOneById(int $id) Return the first Journal filtered by the id column
 * @method     Journal findOneByTitle(string $title) Return the first Journal filtered by the title column
 * @method     Journal findOneByTitleSlug(string $title_slug) Return the first Journal filtered by the title_slug column
 * @method     Journal findOneByTextAbstract(string $text_abstract) Return the first Journal filtered by the text_abstract column
 * @method     Journal findOneByShowTitle(int $show_title) Return the first Journal filtered by the show_title column
 * @method     Journal findOneByShowAbstract(int $show_abstract) Return the first Journal filtered by the show_abstract column
 * @method     Journal findOneByShowFulltext(int $show_fulltext) Return the first Journal filtered by the show_fulltext column
 * @method     Journal findOneByShowFileUpload(int $show_file_upload) Return the first Journal filtered by the show_file_upload column
 * @method     Journal findOneByPostOrderType(string $post_order_type) Return the first Journal filtered by the post_order_type column
 *
 * @method     array findById(int $id) Return Journal objects filtered by the id column
 * @method     array findByTitle(string $title) Return Journal objects filtered by the title column
 * @method     array findByTitleSlug(string $title_slug) Return Journal objects filtered by the title_slug column
 * @method     array findByTextAbstract(string $text_abstract) Return Journal objects filtered by the text_abstract column
 * @method     array findByShowTitle(int $show_title) Return Journal objects filtered by the show_title column
 * @method     array findByShowAbstract(int $show_abstract) Return Journal objects filtered by the show_abstract column
 * @method     array findByShowFulltext(int $show_fulltext) Return Journal objects filtered by the show_fulltext column
 * @method     array findByShowFileUpload(int $show_file_upload) Return Journal objects filtered by the show_file_upload column
 * @method     array findByPostOrderType(string $post_order_type) Return Journal objects filtered by the post_order_type column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseJournalQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseJournalQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'Journal', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new JournalQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    JournalQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof JournalQuery) {
			return $criteria;
		}
		$query = new JournalQuery();
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
	 * @return    Journal|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = JournalPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(JournalPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(JournalPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(JournalPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
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
		return $this->addUsingAlias(JournalPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the title_slug column
	 * 
	 * @param     string $titleSlug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
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
		return $this->addUsingAlias(JournalPeer::TITLE_SLUG, $titleSlug, $comparison);
	}

	/**
	 * Filter the query on the text_abstract column
	 * 
	 * @param     string $textAbstract The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByTextAbstract($textAbstract = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($textAbstract)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $textAbstract)) {
				$textAbstract = str_replace('*', '%', $textAbstract);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(JournalPeer::TEXT_ABSTRACT, $textAbstract, $comparison);
	}

	/**
	 * Filter the query on the show_title column
	 * 
	 * @param     int|array $showTitle The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByShowTitle($showTitle = null, $comparison = null)
	{
		if (is_array($showTitle)) {
			$useMinMax = false;
			if (isset($showTitle['min'])) {
				$this->addUsingAlias(JournalPeer::SHOW_TITLE, $showTitle['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($showTitle['max'])) {
				$this->addUsingAlias(JournalPeer::SHOW_TITLE, $showTitle['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPeer::SHOW_TITLE, $showTitle, $comparison);
	}

	/**
	 * Filter the query on the show_abstract column
	 * 
	 * @param     int|array $showAbstract The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByShowAbstract($showAbstract = null, $comparison = null)
	{
		if (is_array($showAbstract)) {
			$useMinMax = false;
			if (isset($showAbstract['min'])) {
				$this->addUsingAlias(JournalPeer::SHOW_ABSTRACT, $showAbstract['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($showAbstract['max'])) {
				$this->addUsingAlias(JournalPeer::SHOW_ABSTRACT, $showAbstract['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPeer::SHOW_ABSTRACT, $showAbstract, $comparison);
	}

	/**
	 * Filter the query on the show_fulltext column
	 * 
	 * @param     int|array $showFulltext The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByShowFulltext($showFulltext = null, $comparison = null)
	{
		if (is_array($showFulltext)) {
			$useMinMax = false;
			if (isset($showFulltext['min'])) {
				$this->addUsingAlias(JournalPeer::SHOW_FULLTEXT, $showFulltext['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($showFulltext['max'])) {
				$this->addUsingAlias(JournalPeer::SHOW_FULLTEXT, $showFulltext['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPeer::SHOW_FULLTEXT, $showFulltext, $comparison);
	}

	/**
	 * Filter the query on the show_file_upload column
	 * 
	 * @param     int|array $showFileUpload The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByShowFileUpload($showFileUpload = null, $comparison = null)
	{
		if (is_array($showFileUpload)) {
			$useMinMax = false;
			if (isset($showFileUpload['min'])) {
				$this->addUsingAlias(JournalPeer::SHOW_FILE_UPLOAD, $showFileUpload['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($showFileUpload['max'])) {
				$this->addUsingAlias(JournalPeer::SHOW_FILE_UPLOAD, $showFileUpload['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPeer::SHOW_FILE_UPLOAD, $showFileUpload, $comparison);
	}

	/**
	 * Filter the query on the post_order_type column
	 * 
	 * @param     string $postOrderType The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByPostOrderType($postOrderType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($postOrderType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $postOrderType)) {
				$postOrderType = str_replace('*', '%', $postOrderType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(JournalPeer::POST_ORDER_TYPE, $postOrderType, $comparison);
	}

	/**
	 * Filter the query by a related JournalPost object
	 *
	 * @param     JournalPost $journalPost  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function filterByJournalPost($journalPost, $comparison = null)
	{
		return $this
			->addUsingAlias(JournalPeer::ID, $journalPost->getJournalId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the JournalPost relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function joinJournalPost($relationAlias = '', $joinType = Criteria::INNER_JOIN)
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
	public function useJournalPostQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinJournalPost($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'JournalPost', 'JournalPostQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Journal $journal Object to remove from the list of results
	 *
	 * @return    JournalQuery The current query, for fluid interface
	 */
	public function prune($journal = null)
	{
		if ($journal) {
			$this->addUsingAlias(JournalPeer::ID, $journal->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseJournalQuery
