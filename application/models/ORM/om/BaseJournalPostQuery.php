<?php


/**
 * Base class that represents a query for the 'journal_post' table.
 *
 * 
 *
 * @method     JournalPostQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     JournalPostQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     JournalPostQuery orderByTitleSlug($order = Criteria::ASC) Order by the title_slug column
 * @method     JournalPostQuery orderByTextAbstract($order = Criteria::ASC) Order by the text_abstract column
 * @method     JournalPostQuery orderByContent($order = Criteria::ASC) Order by the content column
 * @method     JournalPostQuery orderByTags($order = Criteria::ASC) Order by the tags column
 * @method     JournalPostQuery orderByCreatorUserId($order = Criteria::ASC) Order by the creator_user_id column
 * @method     JournalPostQuery orderByCreated($order = Criteria::ASC) Order by the created column
 * @method     JournalPostQuery orderByEditorUserId($order = Criteria::ASC) Order by the editor_user_id column
 * @method     JournalPostQuery orderByEdited($order = Criteria::ASC) Order by the edited column
 * @method     JournalPostQuery orderByStartDate($order = Criteria::ASC) Order by the start_date column
 * @method     JournalPostQuery orderByEndDate($order = Criteria::ASC) Order by the end_date column
 * @method     JournalPostQuery orderByRank($order = Criteria::ASC) Order by the rank column
 * @method     JournalPostQuery orderByIsPublic($order = Criteria::ASC) Order by the is_public column
 * @method     JournalPostQuery orderByJournalId($order = Criteria::ASC) Order by the journal_id column
 * @method     JournalPostQuery orderByFileId($order = Criteria::ASC) Order by the file_id column
 * @method     JournalPostQuery orderByFileType($order = Criteria::ASC) Order by the file_type column
 *
 * @method     JournalPostQuery groupById() Group by the id column
 * @method     JournalPostQuery groupByTitle() Group by the title column
 * @method     JournalPostQuery groupByTitleSlug() Group by the title_slug column
 * @method     JournalPostQuery groupByTextAbstract() Group by the text_abstract column
 * @method     JournalPostQuery groupByContent() Group by the content column
 * @method     JournalPostQuery groupByTags() Group by the tags column
 * @method     JournalPostQuery groupByCreatorUserId() Group by the creator_user_id column
 * @method     JournalPostQuery groupByCreated() Group by the created column
 * @method     JournalPostQuery groupByEditorUserId() Group by the editor_user_id column
 * @method     JournalPostQuery groupByEdited() Group by the edited column
 * @method     JournalPostQuery groupByStartDate() Group by the start_date column
 * @method     JournalPostQuery groupByEndDate() Group by the end_date column
 * @method     JournalPostQuery groupByRank() Group by the rank column
 * @method     JournalPostQuery groupByIsPublic() Group by the is_public column
 * @method     JournalPostQuery groupByJournalId() Group by the journal_id column
 * @method     JournalPostQuery groupByFileId() Group by the file_id column
 * @method     JournalPostQuery groupByFileType() Group by the file_type column
 *
 * @method     JournalPostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     JournalPostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     JournalPostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     JournalPostQuery leftJoinFiles($relationAlias = '') Adds a LEFT JOIN clause to the query using the Files relation
 * @method     JournalPostQuery rightJoinFiles($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Files relation
 * @method     JournalPostQuery innerJoinFiles($relationAlias = '') Adds a INNER JOIN clause to the query using the Files relation
 *
 * @method     JournalPostQuery leftJoinAdminsRelatedByCreatorUserId($relationAlias = '') Adds a LEFT JOIN clause to the query using the AdminsRelatedByCreatorUserId relation
 * @method     JournalPostQuery rightJoinAdminsRelatedByCreatorUserId($relationAlias = '') Adds a RIGHT JOIN clause to the query using the AdminsRelatedByCreatorUserId relation
 * @method     JournalPostQuery innerJoinAdminsRelatedByCreatorUserId($relationAlias = '') Adds a INNER JOIN clause to the query using the AdminsRelatedByCreatorUserId relation
 *
 * @method     JournalPostQuery leftJoinAdminsRelatedByEditorUserId($relationAlias = '') Adds a LEFT JOIN clause to the query using the AdminsRelatedByEditorUserId relation
 * @method     JournalPostQuery rightJoinAdminsRelatedByEditorUserId($relationAlias = '') Adds a RIGHT JOIN clause to the query using the AdminsRelatedByEditorUserId relation
 * @method     JournalPostQuery innerJoinAdminsRelatedByEditorUserId($relationAlias = '') Adds a INNER JOIN clause to the query using the AdminsRelatedByEditorUserId relation
 *
 * @method     JournalPostQuery leftJoinJournal($relationAlias = '') Adds a LEFT JOIN clause to the query using the Journal relation
 * @method     JournalPostQuery rightJoinJournal($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Journal relation
 * @method     JournalPostQuery innerJoinJournal($relationAlias = '') Adds a INNER JOIN clause to the query using the Journal relation
 *
 * @method     JournalPost findOne(PropelPDO $con = null) Return the first JournalPost matching the query
 * @method     JournalPost findOneOrCreate(PropelPDO $con = null) Return the first JournalPost matching the query, or a new JournalPost object populated from the query conditions when no match is found
 *
 * @method     JournalPost findOneById(int $id) Return the first JournalPost filtered by the id column
 * @method     JournalPost findOneByTitle(string $title) Return the first JournalPost filtered by the title column
 * @method     JournalPost findOneByTitleSlug(string $title_slug) Return the first JournalPost filtered by the title_slug column
 * @method     JournalPost findOneByTextAbstract(string $text_abstract) Return the first JournalPost filtered by the text_abstract column
 * @method     JournalPost findOneByContent(string $content) Return the first JournalPost filtered by the content column
 * @method     JournalPost findOneByTags(string $tags) Return the first JournalPost filtered by the tags column
 * @method     JournalPost findOneByCreatorUserId(int $creator_user_id) Return the first JournalPost filtered by the creator_user_id column
 * @method     JournalPost findOneByCreated(string $created) Return the first JournalPost filtered by the created column
 * @method     JournalPost findOneByEditorUserId(int $editor_user_id) Return the first JournalPost filtered by the editor_user_id column
 * @method     JournalPost findOneByEdited(string $edited) Return the first JournalPost filtered by the edited column
 * @method     JournalPost findOneByStartDate(string $start_date) Return the first JournalPost filtered by the start_date column
 * @method     JournalPost findOneByEndDate(string $end_date) Return the first JournalPost filtered by the end_date column
 * @method     JournalPost findOneByRank(int $rank) Return the first JournalPost filtered by the rank column
 * @method     JournalPost findOneByIsPublic(int $is_public) Return the first JournalPost filtered by the is_public column
 * @method     JournalPost findOneByJournalId(int $journal_id) Return the first JournalPost filtered by the journal_id column
 * @method     JournalPost findOneByFileId(int $file_id) Return the first JournalPost filtered by the file_id column
 * @method     JournalPost findOneByFileType(string $file_type) Return the first JournalPost filtered by the file_type column
 *
 * @method     array findById(int $id) Return JournalPost objects filtered by the id column
 * @method     array findByTitle(string $title) Return JournalPost objects filtered by the title column
 * @method     array findByTitleSlug(string $title_slug) Return JournalPost objects filtered by the title_slug column
 * @method     array findByTextAbstract(string $text_abstract) Return JournalPost objects filtered by the text_abstract column
 * @method     array findByContent(string $content) Return JournalPost objects filtered by the content column
 * @method     array findByTags(string $tags) Return JournalPost objects filtered by the tags column
 * @method     array findByCreatorUserId(int $creator_user_id) Return JournalPost objects filtered by the creator_user_id column
 * @method     array findByCreated(string $created) Return JournalPost objects filtered by the created column
 * @method     array findByEditorUserId(int $editor_user_id) Return JournalPost objects filtered by the editor_user_id column
 * @method     array findByEdited(string $edited) Return JournalPost objects filtered by the edited column
 * @method     array findByStartDate(string $start_date) Return JournalPost objects filtered by the start_date column
 * @method     array findByEndDate(string $end_date) Return JournalPost objects filtered by the end_date column
 * @method     array findByRank(int $rank) Return JournalPost objects filtered by the rank column
 * @method     array findByIsPublic(int $is_public) Return JournalPost objects filtered by the is_public column
 * @method     array findByJournalId(int $journal_id) Return JournalPost objects filtered by the journal_id column
 * @method     array findByFileId(int $file_id) Return JournalPost objects filtered by the file_id column
 * @method     array findByFileType(string $file_type) Return JournalPost objects filtered by the file_type column
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseJournalPostQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseJournalPostQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'ORM', $modelName = 'JournalPost', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new JournalPostQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    JournalPostQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof JournalPostQuery) {
			return $criteria;
		}
		$query = new JournalPostQuery();
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
	 * @return    JournalPost|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = JournalPostPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(JournalPostPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(JournalPostPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(JournalPostPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the title column
	 * 
	 * @param     string $title The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(JournalPostPeer::TITLE, $title, $comparison);
	}

	/**
	 * Filter the query on the title_slug column
	 * 
	 * @param     string $titleSlug The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(JournalPostPeer::TITLE_SLUG, $titleSlug, $comparison);
	}

	/**
	 * Filter the query on the text_abstract column
	 * 
	 * @param     string $textAbstract The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
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
		return $this->addUsingAlias(JournalPostPeer::TEXT_ABSTRACT, $textAbstract, $comparison);
	}

	/**
	 * Filter the query on the content column
	 * 
	 * @param     string $content The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByContent($content = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($content)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $content)) {
				$content = str_replace('*', '%', $content);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::CONTENT, $content, $comparison);
	}

	/**
	 * Filter the query on the tags column
	 * 
	 * @param     string $tags The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByTags($tags = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tags)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tags)) {
				$tags = str_replace('*', '%', $tags);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::TAGS, $tags, $comparison);
	}

	/**
	 * Filter the query on the creator_user_id column
	 * 
	 * @param     int|array $creatorUserId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByCreatorUserId($creatorUserId = null, $comparison = null)
	{
		if (is_array($creatorUserId)) {
			$useMinMax = false;
			if (isset($creatorUserId['min'])) {
				$this->addUsingAlias(JournalPostPeer::CREATOR_USER_ID, $creatorUserId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($creatorUserId['max'])) {
				$this->addUsingAlias(JournalPostPeer::CREATOR_USER_ID, $creatorUserId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::CREATOR_USER_ID, $creatorUserId, $comparison);
	}

	/**
	 * Filter the query on the created column
	 * 
	 * @param     string|array $created The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByCreated($created = null, $comparison = null)
	{
		if (is_array($created)) {
			$useMinMax = false;
			if (isset($created['min'])) {
				$this->addUsingAlias(JournalPostPeer::CREATED, $created['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($created['max'])) {
				$this->addUsingAlias(JournalPostPeer::CREATED, $created['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::CREATED, $created, $comparison);
	}

	/**
	 * Filter the query on the editor_user_id column
	 * 
	 * @param     int|array $editorUserId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByEditorUserId($editorUserId = null, $comparison = null)
	{
		if (is_array($editorUserId)) {
			$useMinMax = false;
			if (isset($editorUserId['min'])) {
				$this->addUsingAlias(JournalPostPeer::EDITOR_USER_ID, $editorUserId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($editorUserId['max'])) {
				$this->addUsingAlias(JournalPostPeer::EDITOR_USER_ID, $editorUserId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::EDITOR_USER_ID, $editorUserId, $comparison);
	}

	/**
	 * Filter the query on the edited column
	 * 
	 * @param     string|array $edited The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByEdited($edited = null, $comparison = null)
	{
		if (is_array($edited)) {
			$useMinMax = false;
			if (isset($edited['min'])) {
				$this->addUsingAlias(JournalPostPeer::EDITED, $edited['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($edited['max'])) {
				$this->addUsingAlias(JournalPostPeer::EDITED, $edited['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::EDITED, $edited, $comparison);
	}

	/**
	 * Filter the query on the start_date column
	 * 
	 * @param     string|array $startDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByStartDate($startDate = null, $comparison = null)
	{
		if (is_array($startDate)) {
			$useMinMax = false;
			if (isset($startDate['min'])) {
				$this->addUsingAlias(JournalPostPeer::START_DATE, $startDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($startDate['max'])) {
				$this->addUsingAlias(JournalPostPeer::START_DATE, $startDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::START_DATE, $startDate, $comparison);
	}

	/**
	 * Filter the query on the end_date column
	 * 
	 * @param     string|array $endDate The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByEndDate($endDate = null, $comparison = null)
	{
		if (is_array($endDate)) {
			$useMinMax = false;
			if (isset($endDate['min'])) {
				$this->addUsingAlias(JournalPostPeer::END_DATE, $endDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($endDate['max'])) {
				$this->addUsingAlias(JournalPostPeer::END_DATE, $endDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::END_DATE, $endDate, $comparison);
	}

	/**
	 * Filter the query on the rank column
	 * 
	 * @param     int|array $rank The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByRank($rank = null, $comparison = null)
	{
		if (is_array($rank)) {
			$useMinMax = false;
			if (isset($rank['min'])) {
				$this->addUsingAlias(JournalPostPeer::RANK, $rank['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($rank['max'])) {
				$this->addUsingAlias(JournalPostPeer::RANK, $rank['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::RANK, $rank, $comparison);
	}

	/**
	 * Filter the query on the is_public column
	 * 
	 * @param     int|array $isPublic The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByIsPublic($isPublic = null, $comparison = null)
	{
		if (is_array($isPublic)) {
			$useMinMax = false;
			if (isset($isPublic['min'])) {
				$this->addUsingAlias(JournalPostPeer::IS_PUBLIC, $isPublic['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($isPublic['max'])) {
				$this->addUsingAlias(JournalPostPeer::IS_PUBLIC, $isPublic['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::IS_PUBLIC, $isPublic, $comparison);
	}

	/**
	 * Filter the query on the journal_id column
	 * 
	 * @param     int|array $journalId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByJournalId($journalId = null, $comparison = null)
	{
		if (is_array($journalId)) {
			$useMinMax = false;
			if (isset($journalId['min'])) {
				$this->addUsingAlias(JournalPostPeer::JOURNAL_ID, $journalId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($journalId['max'])) {
				$this->addUsingAlias(JournalPostPeer::JOURNAL_ID, $journalId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::JOURNAL_ID, $journalId, $comparison);
	}

	/**
	 * Filter the query on the file_id column
	 * 
	 * @param     int|array $fileId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByFileId($fileId = null, $comparison = null)
	{
		if (is_array($fileId)) {
			$useMinMax = false;
			if (isset($fileId['min'])) {
				$this->addUsingAlias(JournalPostPeer::FILE_ID, $fileId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fileId['max'])) {
				$this->addUsingAlias(JournalPostPeer::FILE_ID, $fileId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::FILE_ID, $fileId, $comparison);
	}

	/**
	 * Filter the query on the file_type column
	 * 
	 * @param     string $fileType The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByFileType($fileType = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($fileType)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $fileType)) {
				$fileType = str_replace('*', '%', $fileType);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(JournalPostPeer::FILE_TYPE, $fileType, $comparison);
	}

	/**
	 * Filter the query by a related Files object
	 *
	 * @param     Files $files  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByFiles($files, $comparison = null)
	{
		return $this
			->addUsingAlias(JournalPostPeer::FILE_ID, $files->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Files relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
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
	 * Filter the query by a related Admins object
	 *
	 * @param     Admins $admins  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByAdminsRelatedByCreatorUserId($admins, $comparison = null)
	{
		return $this
			->addUsingAlias(JournalPostPeer::CREATOR_USER_ID, $admins->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminsRelatedByCreatorUserId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function joinAdminsRelatedByCreatorUserId($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdminsRelatedByCreatorUserId');
		
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
			$this->addJoinObject($join, 'AdminsRelatedByCreatorUserId');
		}
		
		return $this;
	}

	/**
	 * Use the AdminsRelatedByCreatorUserId relation Admins object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminsQuery A secondary query class using the current class as primary query
	 */
	public function useAdminsRelatedByCreatorUserIdQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAdminsRelatedByCreatorUserId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdminsRelatedByCreatorUserId', 'AdminsQuery');
	}

	/**
	 * Filter the query by a related Admins object
	 *
	 * @param     Admins $admins  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByAdminsRelatedByEditorUserId($admins, $comparison = null)
	{
		return $this
			->addUsingAlias(JournalPostPeer::EDITOR_USER_ID, $admins->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the AdminsRelatedByEditorUserId relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function joinAdminsRelatedByEditorUserId($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('AdminsRelatedByEditorUserId');
		
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
			$this->addJoinObject($join, 'AdminsRelatedByEditorUserId');
		}
		
		return $this;
	}

	/**
	 * Use the AdminsRelatedByEditorUserId relation Admins object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    AdminsQuery A secondary query class using the current class as primary query
	 */
	public function useAdminsRelatedByEditorUserIdQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinAdminsRelatedByEditorUserId($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'AdminsRelatedByEditorUserId', 'AdminsQuery');
	}

	/**
	 * Filter the query by a related Journal object
	 *
	 * @param     Journal $journal  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function filterByJournal($journal, $comparison = null)
	{
		return $this
			->addUsingAlias(JournalPostPeer::JOURNAL_ID, $journal->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Journal relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function joinJournal($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Journal');
		
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
			$this->addJoinObject($join, 'Journal');
		}
		
		return $this;
	}

	/**
	 * Use the Journal relation Journal object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    JournalQuery A secondary query class using the current class as primary query
	 */
	public function useJournalQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinJournal($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Journal', 'JournalQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     JournalPost $journalPost Object to remove from the list of results
	 *
	 * @return    JournalPostQuery The current query, for fluid interface
	 */
	public function prune($journalPost = null)
	{
		if ($journalPost) {
			$this->addUsingAlias(JournalPostPeer::ID, $journalPost->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseJournalPostQuery
