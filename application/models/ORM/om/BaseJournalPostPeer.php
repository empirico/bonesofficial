<?php


/**
 * Base static class for performing query and update operations on the 'journal_post' table.
 *
 * 
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseJournalPostPeer {

	/** the default database name for this class */
	const DATABASE_NAME = 'ORM';

	/** the table name for this class */
	const TABLE_NAME = 'journal_post';

	/** the related Propel class for this table */
	const OM_CLASS = 'JournalPost';

	/** A class that can be returned by this peer. */
	const CLASS_DEFAULT = 'ORM.JournalPost';

	/** the related TableMap class for this table */
	const TM_CLASS = 'JournalPostTableMap';
	
	/** The total number of columns. */
	const NUM_COLUMNS = 16;

	/** The number of lazy-loaded columns. */
	const NUM_LAZY_LOAD_COLUMNS = 0;

	/** the column name for the ID field */
	const ID = 'journal_post.ID';

	/** the column name for the TITLE field */
	const TITLE = 'journal_post.TITLE';

	/** the column name for the TITLE_SLUG field */
	const TITLE_SLUG = 'journal_post.TITLE_SLUG';

	/** the column name for the TEXT_ABSTRACT field */
	const TEXT_ABSTRACT = 'journal_post.TEXT_ABSTRACT';

	/** the column name for the CONTENT field */
	const CONTENT = 'journal_post.CONTENT';

	/** the column name for the TAGS field */
	const TAGS = 'journal_post.TAGS';

	/** the column name for the CREATOR_USER_ID field */
	const CREATOR_USER_ID = 'journal_post.CREATOR_USER_ID';

	/** the column name for the CREATED field */
	const CREATED = 'journal_post.CREATED';

	/** the column name for the EDITOR_USER_ID field */
	const EDITOR_USER_ID = 'journal_post.EDITOR_USER_ID';

	/** the column name for the EDITED field */
	const EDITED = 'journal_post.EDITED';

	/** the column name for the START_DATE field */
	const START_DATE = 'journal_post.START_DATE';

	/** the column name for the END_DATE field */
	const END_DATE = 'journal_post.END_DATE';

	/** the column name for the RANK field */
	const RANK = 'journal_post.RANK';

	/** the column name for the IS_PUBLIC field */
	const IS_PUBLIC = 'journal_post.IS_PUBLIC';

	/** the column name for the JOURNAL_ID field */
	const JOURNAL_ID = 'journal_post.JOURNAL_ID';

	/** the column name for the FILE_ID field */
	const FILE_ID = 'journal_post.FILE_ID';

	/**
	 * An identiy map to hold any loaded instances of JournalPost objects.
	 * This must be public so that other peer classes can access this when hydrating from JOIN
	 * queries.
	 * @var        array JournalPost[]
	 */
	public static $instances = array();


	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 */
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Title', 'TitleSlug', 'TextAbstract', 'Content', 'Tags', 'CreatorUserId', 'Created', 'EditorUserId', 'Edited', 'StartDate', 'EndDate', 'Rank', 'IsPublic', 'JournalId', 'FileId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'title', 'titleSlug', 'textAbstract', 'content', 'tags', 'creatorUserId', 'created', 'editorUserId', 'edited', 'startDate', 'endDate', 'rank', 'isPublic', 'journalId', 'fileId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::TITLE, self::TITLE_SLUG, self::TEXT_ABSTRACT, self::CONTENT, self::TAGS, self::CREATOR_USER_ID, self::CREATED, self::EDITOR_USER_ID, self::EDITED, self::START_DATE, self::END_DATE, self::RANK, self::IS_PUBLIC, self::JOURNAL_ID, self::FILE_ID, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID', 'TITLE', 'TITLE_SLUG', 'TEXT_ABSTRACT', 'CONTENT', 'TAGS', 'CREATOR_USER_ID', 'CREATED', 'EDITOR_USER_ID', 'EDITED', 'START_DATE', 'END_DATE', 'RANK', 'IS_PUBLIC', 'JOURNAL_ID', 'FILE_ID', ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'title', 'title_slug', 'text_abstract', 'content', 'tags', 'creator_user_id', 'created', 'editor_user_id', 'edited', 'start_date', 'end_date', 'rank', 'is_public', 'journal_id', 'file_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
	 */
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Title' => 1, 'TitleSlug' => 2, 'TextAbstract' => 3, 'Content' => 4, 'Tags' => 5, 'CreatorUserId' => 6, 'Created' => 7, 'EditorUserId' => 8, 'Edited' => 9, 'StartDate' => 10, 'EndDate' => 11, 'Rank' => 12, 'IsPublic' => 13, 'JournalId' => 14, 'FileId' => 15, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'title' => 1, 'titleSlug' => 2, 'textAbstract' => 3, 'content' => 4, 'tags' => 5, 'creatorUserId' => 6, 'created' => 7, 'editorUserId' => 8, 'edited' => 9, 'startDate' => 10, 'endDate' => 11, 'rank' => 12, 'isPublic' => 13, 'journalId' => 14, 'fileId' => 15, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::TITLE => 1, self::TITLE_SLUG => 2, self::TEXT_ABSTRACT => 3, self::CONTENT => 4, self::TAGS => 5, self::CREATOR_USER_ID => 6, self::CREATED => 7, self::EDITOR_USER_ID => 8, self::EDITED => 9, self::START_DATE => 10, self::END_DATE => 11, self::RANK => 12, self::IS_PUBLIC => 13, self::JOURNAL_ID => 14, self::FILE_ID => 15, ),
		BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'TITLE' => 1, 'TITLE_SLUG' => 2, 'TEXT_ABSTRACT' => 3, 'CONTENT' => 4, 'TAGS' => 5, 'CREATOR_USER_ID' => 6, 'CREATED' => 7, 'EDITOR_USER_ID' => 8, 'EDITED' => 9, 'START_DATE' => 10, 'END_DATE' => 11, 'RANK' => 12, 'IS_PUBLIC' => 13, 'JOURNAL_ID' => 14, 'FILE_ID' => 15, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'title' => 1, 'title_slug' => 2, 'text_abstract' => 3, 'content' => 4, 'tags' => 5, 'creator_user_id' => 6, 'created' => 7, 'editor_user_id' => 8, 'edited' => 9, 'start_date' => 10, 'end_date' => 11, 'rank' => 12, 'is_public' => 13, 'journal_id' => 14, 'file_id' => 15, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, )
	);

	/**
	 * Translates a fieldname to another type
	 *
	 * @param      string $name field name
	 * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @param      string $toType   One of the class type constants
	 * @return     string translated name of the field.
	 * @throws     PropelException - if the specified name could not be found in the fieldname mappings.
	 */
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	/**
	 * Returns an array of field names.
	 *
	 * @param      string $type The type of fieldnames to return:
	 *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     array A list of field names
	 */

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	/**
	 * Convenience method which changes table.column to alias.column.
	 *
	 * Using this method you can maintain SQL abstraction while using column aliases.
	 * <code>
	 *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
	 *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
	 * </code>
	 * @param      string $alias The alias for the current table.
	 * @param      string $column The column name for current table. (i.e. JournalPostPeer::COLUMN_NAME).
	 * @return     string
	 */
	public static function alias($alias, $column)
	{
		return str_replace(JournalPostPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param      Criteria $criteria object containing the columns to add.
	 * @param      string   $alias    optional table alias
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, $alias = null)
	{
		if (null === $alias) {
			$criteria->addSelectColumn(JournalPostPeer::ID);
			$criteria->addSelectColumn(JournalPostPeer::TITLE);
			$criteria->addSelectColumn(JournalPostPeer::TITLE_SLUG);
			$criteria->addSelectColumn(JournalPostPeer::TEXT_ABSTRACT);
			$criteria->addSelectColumn(JournalPostPeer::CONTENT);
			$criteria->addSelectColumn(JournalPostPeer::TAGS);
			$criteria->addSelectColumn(JournalPostPeer::CREATOR_USER_ID);
			$criteria->addSelectColumn(JournalPostPeer::CREATED);
			$criteria->addSelectColumn(JournalPostPeer::EDITOR_USER_ID);
			$criteria->addSelectColumn(JournalPostPeer::EDITED);
			$criteria->addSelectColumn(JournalPostPeer::START_DATE);
			$criteria->addSelectColumn(JournalPostPeer::END_DATE);
			$criteria->addSelectColumn(JournalPostPeer::RANK);
			$criteria->addSelectColumn(JournalPostPeer::IS_PUBLIC);
			$criteria->addSelectColumn(JournalPostPeer::JOURNAL_ID);
			$criteria->addSelectColumn(JournalPostPeer::FILE_ID);
		} else {
			$criteria->addSelectColumn($alias . '.ID');
			$criteria->addSelectColumn($alias . '.TITLE');
			$criteria->addSelectColumn($alias . '.TITLE_SLUG');
			$criteria->addSelectColumn($alias . '.TEXT_ABSTRACT');
			$criteria->addSelectColumn($alias . '.CONTENT');
			$criteria->addSelectColumn($alias . '.TAGS');
			$criteria->addSelectColumn($alias . '.CREATOR_USER_ID');
			$criteria->addSelectColumn($alias . '.CREATED');
			$criteria->addSelectColumn($alias . '.EDITOR_USER_ID');
			$criteria->addSelectColumn($alias . '.EDITED');
			$criteria->addSelectColumn($alias . '.START_DATE');
			$criteria->addSelectColumn($alias . '.END_DATE');
			$criteria->addSelectColumn($alias . '.RANK');
			$criteria->addSelectColumn($alias . '.IS_PUBLIC');
			$criteria->addSelectColumn($alias . '.JOURNAL_ID');
			$criteria->addSelectColumn($alias . '.FILE_ID');
		}
	}

	/**
	 * Returns the number of rows matching criteria.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @return     int Number of matching rows.
	 */
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
		// we may modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		$criteria->setDbName(self::DATABASE_NAME); // Set the correct dbName

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		// BasePeer returns a PDOStatement
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}
	/**
	 * Method to select one object from the DB.
	 *
	 * @param      Criteria $criteria object used to create the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     JournalPost
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = JournalPostPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	/**
	 * Method to do selects.
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con
	 * @return     array Array of selected Objects
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return JournalPostPeer::populateObjects(JournalPostPeer::doSelectStmt($criteria, $con));
	}
	/**
	 * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
	 *
	 * Use this method directly if you want to work with an executed statement durirectly (for example
	 * to perform your own object hydration).
	 *
	 * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
	 * @param      PropelPDO $con The connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     PDOStatement The executed PDOStatement object.
	 * @see        BasePeer::doSelect()
	 */
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			JournalPostPeer::addSelectColumns($criteria);
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		// BasePeer returns a PDOStatement
		return BasePeer::doSelect($criteria, $con);
	}
	/**
	 * Adds an object to the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doSelect*()
	 * methods in your stub classes -- you may need to explicitly add objects
	 * to the cache in order to ensure that the same objects are always returned by doSelect*()
	 * and retrieveByPK*() calls.
	 *
	 * @param      JournalPost $value A JournalPost object.
	 * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
	 */
	public static function addInstanceToPool(JournalPost $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} // if key === null
			self::$instances[$key] = $obj;
		}
	}

	/**
	 * Removes an object from the instance pool.
	 *
	 * Propel keeps cached copies of objects in an instance pool when they are retrieved
	 * from the database.  In some cases -- especially when you override doDelete
	 * methods in your stub classes -- you may need to explicitly remove objects
	 * from the cache in order to prevent returning objects that no longer exist.
	 *
	 * @param      mixed $value A JournalPost object or a primary key value.
	 */
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof JournalPost) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
				// assume we've been passed a primary key
				$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or JournalPost object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} // removeInstanceFromPool()

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
	 * @return     JournalPost Found object or NULL if 1) no instance exists for specified key or 2) instance pooling has been disabled.
	 * @see        getPrimaryKeyHash()
	 */
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; // just to be explicit
	}
	
	/**
	 * Clear the instance pool.
	 *
	 * @return     void
	 */
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	/**
	 * Method to invalidate the instance pool of all tables related to journal_post
	 * by a foreign key with ON DELETE CASCADE
	 */
	public static function clearRelatedInstancePool()
	{
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     string A string version of PK or NULL if the components of primary key in result array are all null.
	 */
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
		// If the PK cannot be derived from the row, return NULL.
		if ($row[$startcol] === null) {
			return null;
		}
		return (string) $row[$startcol];
	}

	/**
	 * Retrieves the primary key from the DB resultset row 
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @return     mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow($row, $startcol = 0)
	{
		return (int) $row[$startcol];
	}
	
	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
		// set the class once to avoid overhead in the loop
		$cls = JournalPostPeer::getOMClass(false);
		// populate the object(s)
		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = JournalPostPeer::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				JournalPostPeer::addInstanceToPool($obj, $key);
			} // if key exists
		}
		$stmt->closeCursor();
		return $results;
	}
	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param      array $row PropelPDO resultset row.
	 * @param      int $startcol The 0-based offset for reading from the resultset row.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 * @return     array (JournalPost object, last column rank)
	 */
	public static function populateObject($row, $startcol = 0)
	{
		$key = JournalPostPeer::getPrimaryKeyHashFromRow($row, $startcol);
		if (null !== ($obj = JournalPostPeer::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $startcol, true); // rehydrate
			$col = $startcol + JournalPostPeer::NUM_COLUMNS;
		} else {
			$cls = JournalPostPeer::OM_CLASS;
			$obj = new $cls();
			$col = $obj->hydrate($row, $startcol);
			JournalPostPeer::addInstanceToPool($obj, $key);
		}
		return array($obj, $col);
	}

	/**
	 * Returns the number of rows matching criteria, joining the related Files table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinFiles(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AdminsRelatedByCreatorUserId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAdminsRelatedByCreatorUserId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(JournalPostPeer::CREATOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AdminsRelatedByEditorUserId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAdminsRelatedByEditorUserId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(JournalPostPeer::EDITOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Journal table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinJournal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of JournalPost objects pre-filled with their Files objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinFiles(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);
		FilesPeer::addSelectColumns($criteria);

		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = FilesPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = FilesPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = FilesPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					FilesPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (JournalPost) to $obj2 (Files)
				$obj2->addJournalPost($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of JournalPost objects pre-filled with their Admins objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAdminsRelatedByCreatorUserId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);
		AdminsPeer::addSelectColumns($criteria);

		$criteria->addJoin(JournalPostPeer::CREATOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AdminsPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AdminsPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AdminsPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AdminsPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (JournalPost) to $obj2 (Admins)
				$obj2->addJournalPostRelatedByCreatorUserId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of JournalPost objects pre-filled with their Admins objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAdminsRelatedByEditorUserId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);
		AdminsPeer::addSelectColumns($criteria);

		$criteria->addJoin(JournalPostPeer::EDITOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = AdminsPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AdminsPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = AdminsPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AdminsPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (JournalPost) to $obj2 (Admins)
				$obj2->addJournalPostRelatedByEditorUserId($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of JournalPost objects pre-filled with their Journal objects.
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinJournal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);
		JournalPeer::addSelectColumns($criteria);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {

				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if $obj1 already loaded

			$key2 = JournalPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = JournalPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = JournalPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					JournalPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 already loaded

				// Add the $obj1 (JournalPost) to $obj2 (Journal)
				$obj2->addJournalPost($obj1);

			} // if joined row was not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining all related tables
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::CREATOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::EDITOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}

	/**
	 * Selects a collection of JournalPost objects pre-filled with all related objects.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol2 = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);

		FilesPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (FilesPeer::NUM_COLUMNS - FilesPeer::NUM_LAZY_LOAD_COLUMNS);

		AdminsPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (AdminsPeer::NUM_COLUMNS - AdminsPeer::NUM_LAZY_LOAD_COLUMNS);

		AdminsPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (AdminsPeer::NUM_COLUMNS - AdminsPeer::NUM_LAZY_LOAD_COLUMNS);

		JournalPeer::addSelectColumns($criteria);
		$startcol6 = $startcol5 + (JournalPeer::NUM_COLUMNS - JournalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::CREATOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::EDITOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);

		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

			// Add objects for joined Files rows

			$key2 = FilesPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = FilesPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$cls = FilesPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					FilesPeer::addInstanceToPool($obj2, $key2);
				} // if obj2 loaded

				// Add the $obj1 (JournalPost) to the collection in $obj2 (Files)
				$obj2->addJournalPost($obj1);
			} // if joined row not null

			// Add objects for joined Admins rows

			$key3 = AdminsPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = AdminsPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$cls = AdminsPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AdminsPeer::addInstanceToPool($obj3, $key3);
				} // if obj3 loaded

				// Add the $obj1 (JournalPost) to the collection in $obj3 (Admins)
				$obj3->addJournalPostRelatedByCreatorUserId($obj1);
			} // if joined row not null

			// Add objects for joined Admins rows

			$key4 = AdminsPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = AdminsPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$cls = AdminsPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					AdminsPeer::addInstanceToPool($obj4, $key4);
				} // if obj4 loaded

				// Add the $obj1 (JournalPost) to the collection in $obj4 (Admins)
				$obj4->addJournalPostRelatedByEditorUserId($obj1);
			} // if joined row not null

			// Add objects for joined Journal rows

			$key5 = JournalPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = JournalPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$cls = JournalPeer::getOMClass(false);

					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					JournalPeer::addInstanceToPool($obj5, $key5);
				} // if obj5 loaded

				// Add the $obj1 (JournalPost) to the collection in $obj5 (Journal)
				$obj5->addJournalPost($obj1);
			} // if joined row not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Files table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptFiles(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(JournalPostPeer::CREATOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::EDITOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AdminsRelatedByCreatorUserId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAdminsRelatedByCreatorUserId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related AdminsRelatedByEditorUserId table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptAdminsRelatedByEditorUserId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Returns the number of rows matching criteria, joining the related Journal table
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     int Number of matching rows.
	 */
	public static function doCountJoinAllExceptJournal(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		// we're going to modify criteria, so copy it first
		$criteria = clone $criteria;

		// We need to set the primary table name, since in the case that there are no WHERE columns
		// it will be impossible for the BasePeer::createSelectSql() method to determine which
		// tables go into the FROM clause.
		$criteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);
		
		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			JournalPostPeer::addSelectColumns($criteria);
		}
		
		$criteria->clearOrderByColumns(); // ORDER BY should not affect count
		
		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::CREATOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::EDITOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; // no rows returned; we infer that means 0 matches.
		}
		$stmt->closeCursor();
		return $count;
	}


	/**
	 * Selects a collection of JournalPost objects pre-filled with all related objects except Files.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptFiles(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol2 = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);

		AdminsPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (AdminsPeer::NUM_COLUMNS - AdminsPeer::NUM_LAZY_LOAD_COLUMNS);

		AdminsPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (AdminsPeer::NUM_COLUMNS - AdminsPeer::NUM_LAZY_LOAD_COLUMNS);

		JournalPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (JournalPeer::NUM_COLUMNS - JournalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(JournalPostPeer::CREATOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::EDITOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Admins rows

				$key2 = AdminsPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = AdminsPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = AdminsPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					AdminsPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj2 (Admins)
				$obj2->addJournalPostRelatedByCreatorUserId($obj1);

			} // if joined row is not null

				// Add objects for joined Admins rows

				$key3 = AdminsPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AdminsPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = AdminsPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AdminsPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj3 (Admins)
				$obj3->addJournalPostRelatedByEditorUserId($obj1);

			} // if joined row is not null

				// Add objects for joined Journal rows

				$key4 = JournalPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = JournalPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = JournalPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					JournalPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj4 (Journal)
				$obj4->addJournalPost($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of JournalPost objects pre-filled with all related objects except AdminsRelatedByCreatorUserId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAdminsRelatedByCreatorUserId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol2 = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);

		FilesPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (FilesPeer::NUM_COLUMNS - FilesPeer::NUM_LAZY_LOAD_COLUMNS);

		JournalPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (JournalPeer::NUM_COLUMNS - JournalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Files rows

				$key2 = FilesPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = FilesPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = FilesPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					FilesPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj2 (Files)
				$obj2->addJournalPost($obj1);

			} // if joined row is not null

				// Add objects for joined Journal rows

				$key3 = JournalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = JournalPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = JournalPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					JournalPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj3 (Journal)
				$obj3->addJournalPost($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of JournalPost objects pre-filled with all related objects except AdminsRelatedByEditorUserId.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptAdminsRelatedByEditorUserId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol2 = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);

		FilesPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (FilesPeer::NUM_COLUMNS - FilesPeer::NUM_LAZY_LOAD_COLUMNS);

		JournalPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (JournalPeer::NUM_COLUMNS - JournalPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::JOURNAL_ID, JournalPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Files rows

				$key2 = FilesPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = FilesPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = FilesPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					FilesPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj2 (Files)
				$obj2->addJournalPost($obj1);

			} // if joined row is not null

				// Add objects for joined Journal rows

				$key3 = JournalPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = JournalPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = JournalPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					JournalPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj3 (Journal)
				$obj3->addJournalPost($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	/**
	 * Selects a collection of JournalPost objects pre-filled with all related objects except Journal.
	 *
	 * @param      Criteria  $criteria
	 * @param      PropelPDO $con
	 * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
	 * @return     array Array of JournalPost objects.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doSelectJoinAllExceptJournal(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$criteria = clone $criteria;

		// Set the correct dbName if it has not been overridden
		// $criteria->getDbName() will return the same object if not set to another value
		// so == check is okay and faster
		if ($criteria->getDbName() == Propel::getDefaultDB()) {
			$criteria->setDbName(self::DATABASE_NAME);
		}

		JournalPostPeer::addSelectColumns($criteria);
		$startcol2 = (JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS);

		FilesPeer::addSelectColumns($criteria);
		$startcol3 = $startcol2 + (FilesPeer::NUM_COLUMNS - FilesPeer::NUM_LAZY_LOAD_COLUMNS);

		AdminsPeer::addSelectColumns($criteria);
		$startcol4 = $startcol3 + (AdminsPeer::NUM_COLUMNS - AdminsPeer::NUM_LAZY_LOAD_COLUMNS);

		AdminsPeer::addSelectColumns($criteria);
		$startcol5 = $startcol4 + (AdminsPeer::NUM_COLUMNS - AdminsPeer::NUM_LAZY_LOAD_COLUMNS);

		$criteria->addJoin(JournalPostPeer::FILE_ID, FilesPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::CREATOR_USER_ID, AdminsPeer::ID, $join_behavior);

		$criteria->addJoin(JournalPostPeer::EDITOR_USER_ID, AdminsPeer::ID, $join_behavior);


		$stmt = BasePeer::doSelect($criteria, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = JournalPostPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = JournalPostPeer::getInstanceFromPool($key1))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj1->hydrate($row, 0, true); // rehydrate
			} else {
				$cls = JournalPostPeer::getOMClass(false);

				$obj1 = new $cls();
				$obj1->hydrate($row);
				JournalPostPeer::addInstanceToPool($obj1, $key1);
			} // if obj1 already loaded

				// Add objects for joined Files rows

				$key2 = FilesPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = FilesPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$cls = FilesPeer::getOMClass(false);

					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					FilesPeer::addInstanceToPool($obj2, $key2);
				} // if $obj2 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj2 (Files)
				$obj2->addJournalPost($obj1);

			} // if joined row is not null

				// Add objects for joined Admins rows

				$key3 = AdminsPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AdminsPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$cls = AdminsPeer::getOMClass(false);

					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AdminsPeer::addInstanceToPool($obj3, $key3);
				} // if $obj3 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj3 (Admins)
				$obj3->addJournalPostRelatedByCreatorUserId($obj1);

			} // if joined row is not null

				// Add objects for joined Admins rows

				$key4 = AdminsPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = AdminsPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$cls = AdminsPeer::getOMClass(false);

					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					AdminsPeer::addInstanceToPool($obj4, $key4);
				} // if $obj4 already loaded

				// Add the $obj1 (JournalPost) to the collection in $obj4 (Admins)
				$obj4->addJournalPostRelatedByEditorUserId($obj1);

			} // if joined row is not null

			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}

	/**
	 * Returns the TableMap related to this peer.
	 * This method is not needed for general use but a specific application could have a need.
	 * @return     TableMap
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	/**
	 * Add a TableMap instance to the database for this peer class.
	 */
	public static function buildTableMap()
	{
	  $dbMap = Propel::getDatabaseMap(BaseJournalPostPeer::DATABASE_NAME);
	  if (!$dbMap->hasTable(BaseJournalPostPeer::TABLE_NAME))
	  {
	    $dbMap->addTableObject(new JournalPostTableMap());
	  }
	}

	/**
	 * The class that the Peer will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is tranalted into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param      boolean $withPrefix Whether or not to return the path with the class name
	 * @return     string path.to.ClassName
	 */
	public static function getOMClass($withPrefix = true)
	{
		return $withPrefix ? JournalPostPeer::CLASS_DEFAULT : JournalPostPeer::OM_CLASS;
	}

	/**
	 * Method perform an INSERT on the database, given a JournalPost or Criteria object.
	 *
	 * @param      mixed $values Criteria or JournalPost object containing data that is used to create the INSERT statement.
	 * @param      PropelPDO $con the PropelPDO connection to use
	 * @return     mixed The new primary key.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity
		} else {
			$criteria = $values->buildCriteria(); // build Criteria from JournalPost object
		}

		if ($criteria->containsKey(JournalPostPeer::ID) && $criteria->keyContainsValue(JournalPostPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.JournalPostPeer::ID.')');
		}


		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		try {
			// use transaction because $criteria could contain info
			// for more than one table (I guess, conceivably)
			$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	/**
	 * Method perform an UPDATE on the database, given a JournalPost or Criteria object.
	 *
	 * @param      mixed $values Criteria or JournalPost object containing data that is used to create the UPDATE statement.
	 * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; // rename for clarity

			$comparison = $criteria->getComparison(JournalPostPeer::ID);
			$value = $criteria->remove(JournalPostPeer::ID);
			if ($value) {
				$selectCriteria->add(JournalPostPeer::ID, $value, $comparison);
			} else {
				$selectCriteria->setPrimaryTableName(JournalPostPeer::TABLE_NAME);
			}

		} else { // $values is JournalPost object
			$criteria = $values->buildCriteria(); // gets full criteria
			$selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
		}

		// set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	/**
	 * Method to DELETE all rows from the journal_post table.
	 *
	 * @return     int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; // initialize var to track total num of affected rows
		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(JournalPostPeer::TABLE_NAME, $con, JournalPostPeer::DATABASE_NAME);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			JournalPostPeer::clearInstancePool();
			JournalPostPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Method perform a DELETE on the database, given a JournalPost or Criteria object OR a primary key value.
	 *
	 * @param      mixed $values Criteria or JournalPost object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param      PropelPDO $con the connection to use
	 * @return     int 	The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *				if supported by native driver or if emulated using Propel.
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			// invalidate the cache for all objects of this type, since we have no
			// way of knowing (without running a query) what objects should be invalidated
			// from the cache based on this Criteria.
			JournalPostPeer::clearInstancePool();
			// rename for clarity
			$criteria = clone $values;
		} elseif ($values instanceof JournalPost) { // it's a model object
			// invalidate the cache for this single object
			JournalPostPeer::removeInstanceFromPool($values);
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(JournalPostPeer::ID, (array) $values, Criteria::IN);
			// invalidate the cache for this object(s)
			foreach ((array) $values as $singleval) {
				JournalPostPeer::removeInstanceFromPool($singleval);
			}
		}

		// Set the correct dbName
		$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; // initialize var to track total num of affected rows

		try {
			// use transaction because $criteria could contain info
			// for more than one table or we could emulating ON DELETE CASCADE, etc.
			$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			JournalPostPeer::clearRelatedInstancePool();
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Validates all modified columns of given JournalPost object.
	 * If parameter $columns is either a single column name or an array of column names
	 * than only those columns are validated.
	 *
	 * NOTICE: This does not apply to primary or foreign keys for now.
	 *
	 * @param      JournalPost $obj The object to validate.
	 * @param      mixed $cols Column name or array of column names.
	 *
	 * @return     mixed TRUE if all columns are valid or the error message of the first invalid column.
	 */
	public static function doValidate(JournalPost $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(JournalPostPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(JournalPostPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		return BasePeer::doValidate(JournalPostPeer::DATABASE_NAME, JournalPostPeer::TABLE_NAME, $columns);
	}

	/**
	 * Retrieve a single object by pkey.
	 *
	 * @param      int $pk the primary key.
	 * @param      PropelPDO $con the connection to use
	 * @return     JournalPost
	 */
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = JournalPostPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(JournalPostPeer::DATABASE_NAME);
		$criteria->add(JournalPostPeer::ID, $pk);

		$v = JournalPostPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	/**
	 * Retrieve multiple objects by pkey.
	 *
	 * @param      array $pks List of primary keys
	 * @param      PropelPDO $con the connection to use
	 * @throws     PropelException Any exceptions caught during processing will be
	 *		 rethrown wrapped into a PropelException.
	 */
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(JournalPostPeer::DATABASE_NAME);
			$criteria->add(JournalPostPeer::ID, $pks, Criteria::IN);
			$objs = JournalPostPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} // BaseJournalPostPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseJournalPostPeer::buildTableMap();

