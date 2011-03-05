<?php


/**
 * Base class that represents a row from the 'journal' table.
 *
 * 
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseJournal extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'JournalPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        JournalPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the title field.
	 * @var        string
	 */
	protected $title;

	/**
	 * The value for the title_slug field.
	 * @var        string
	 */
	protected $title_slug;

	/**
	 * The value for the text_abstract field.
	 * @var        string
	 */
	protected $text_abstract;

	/**
	 * The value for the show_title field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $show_title;

	/**
	 * The value for the show_abstract field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $show_abstract;

	/**
	 * The value for the show_fulltext field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $show_fulltext;

	/**
	 * The value for the show_file_upload field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $show_file_upload;

	/**
	 * The value for the post_order_type field.
	 * Note: this column has a database default value of: 'rank'
	 * @var        string
	 */
	protected $post_order_type;

	/**
	 * @var        array JournalPost[] Collection to store aggregation of JournalPost objects.
	 */
	protected $collJournalPosts;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->show_title = 1;
		$this->show_abstract = 1;
		$this->show_fulltext = 1;
		$this->show_file_upload = 1;
		$this->post_order_type = 'rank';
	}

	/**
	 * Initializes internal state of BaseJournal object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [title] column value.
	 * 
	 * @return     string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Get the [title_slug] column value.
	 * 
	 * @return     string
	 */
	public function getTitleSlug()
	{
		return $this->title_slug;
	}

	/**
	 * Get the [text_abstract] column value.
	 * 
	 * @return     string
	 */
	public function getTextAbstract()
	{
		return $this->text_abstract;
	}

	/**
	 * Get the [show_title] column value.
	 * 
	 * @return     int
	 */
	public function getShowTitle()
	{
		return $this->show_title;
	}

	/**
	 * Get the [show_abstract] column value.
	 * 
	 * @return     int
	 */
	public function getShowAbstract()
	{
		return $this->show_abstract;
	}

	/**
	 * Get the [show_fulltext] column value.
	 * 
	 * @return     int
	 */
	public function getShowFulltext()
	{
		return $this->show_fulltext;
	}

	/**
	 * Get the [show_file_upload] column value.
	 * 
	 * @return     int
	 */
	public function getShowFileUpload()
	{
		return $this->show_file_upload;
	}

	/**
	 * Get the [post_order_type] column value.
	 * 
	 * @return     string
	 */
	public function getPostOrderType()
	{
		return $this->post_order_type;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = JournalPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = JournalPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [title_slug] column.
	 * 
	 * @param      string $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setTitleSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title_slug !== $v) {
			$this->title_slug = $v;
			$this->modifiedColumns[] = JournalPeer::TITLE_SLUG;
		}

		return $this;
	} // setTitleSlug()

	/**
	 * Set the value of [text_abstract] column.
	 * 
	 * @param      string $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setTextAbstract($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->text_abstract !== $v) {
			$this->text_abstract = $v;
			$this->modifiedColumns[] = JournalPeer::TEXT_ABSTRACT;
		}

		return $this;
	} // setTextAbstract()

	/**
	 * Set the value of [show_title] column.
	 * 
	 * @param      int $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setShowTitle($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->show_title !== $v || $this->isNew()) {
			$this->show_title = $v;
			$this->modifiedColumns[] = JournalPeer::SHOW_TITLE;
		}

		return $this;
	} // setShowTitle()

	/**
	 * Set the value of [show_abstract] column.
	 * 
	 * @param      int $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setShowAbstract($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->show_abstract !== $v || $this->isNew()) {
			$this->show_abstract = $v;
			$this->modifiedColumns[] = JournalPeer::SHOW_ABSTRACT;
		}

		return $this;
	} // setShowAbstract()

	/**
	 * Set the value of [show_fulltext] column.
	 * 
	 * @param      int $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setShowFulltext($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->show_fulltext !== $v || $this->isNew()) {
			$this->show_fulltext = $v;
			$this->modifiedColumns[] = JournalPeer::SHOW_FULLTEXT;
		}

		return $this;
	} // setShowFulltext()

	/**
	 * Set the value of [show_file_upload] column.
	 * 
	 * @param      int $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setShowFileUpload($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->show_file_upload !== $v || $this->isNew()) {
			$this->show_file_upload = $v;
			$this->modifiedColumns[] = JournalPeer::SHOW_FILE_UPLOAD;
		}

		return $this;
	} // setShowFileUpload()

	/**
	 * Set the value of [post_order_type] column.
	 * 
	 * @param      string $v new value
	 * @return     Journal The current object (for fluent API support)
	 */
	public function setPostOrderType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->post_order_type !== $v || $this->isNew()) {
			$this->post_order_type = $v;
			$this->modifiedColumns[] = JournalPeer::POST_ORDER_TYPE;
		}

		return $this;
	} // setPostOrderType()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->show_title !== 1) {
				return false;
			}

			if ($this->show_abstract !== 1) {
				return false;
			}

			if ($this->show_fulltext !== 1) {
				return false;
			}

			if ($this->show_file_upload !== 1) {
				return false;
			}

			if ($this->post_order_type !== 'rank') {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->title = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->title_slug = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->text_abstract = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->show_title = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->show_abstract = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->show_fulltext = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->show_file_upload = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->post_order_type = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = JournalPeer::NUM_COLUMNS - JournalPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Journal object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(JournalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = JournalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collJournalPosts = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(JournalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				JournalQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(JournalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				JournalPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = JournalPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(JournalPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.JournalPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = JournalPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collJournalPosts !== null) {
				foreach ($this->collJournalPosts as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = JournalPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collJournalPosts !== null) {
					foreach ($this->collJournalPosts as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = JournalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTitle();
				break;
			case 2:
				return $this->getTitleSlug();
				break;
			case 3:
				return $this->getTextAbstract();
				break;
			case 4:
				return $this->getShowTitle();
				break;
			case 5:
				return $this->getShowAbstract();
				break;
			case 6:
				return $this->getShowFulltext();
				break;
			case 7:
				return $this->getShowFileUpload();
				break;
			case 8:
				return $this->getPostOrderType();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. 
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = JournalPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getTitleSlug(),
			$keys[3] => $this->getTextAbstract(),
			$keys[4] => $this->getShowTitle(),
			$keys[5] => $this->getShowAbstract(),
			$keys[6] => $this->getShowFulltext(),
			$keys[7] => $this->getShowFileUpload(),
			$keys[8] => $this->getPostOrderType(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = JournalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTitle($value);
				break;
			case 2:
				$this->setTitleSlug($value);
				break;
			case 3:
				$this->setTextAbstract($value);
				break;
			case 4:
				$this->setShowTitle($value);
				break;
			case 5:
				$this->setShowAbstract($value);
				break;
			case 6:
				$this->setShowFulltext($value);
				break;
			case 7:
				$this->setShowFileUpload($value);
				break;
			case 8:
				$this->setPostOrderType($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = JournalPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitleSlug($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTextAbstract($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setShowTitle($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setShowAbstract($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setShowFulltext($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setShowFileUpload($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPostOrderType($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(JournalPeer::DATABASE_NAME);

		if ($this->isColumnModified(JournalPeer::ID)) $criteria->add(JournalPeer::ID, $this->id);
		if ($this->isColumnModified(JournalPeer::TITLE)) $criteria->add(JournalPeer::TITLE, $this->title);
		if ($this->isColumnModified(JournalPeer::TITLE_SLUG)) $criteria->add(JournalPeer::TITLE_SLUG, $this->title_slug);
		if ($this->isColumnModified(JournalPeer::TEXT_ABSTRACT)) $criteria->add(JournalPeer::TEXT_ABSTRACT, $this->text_abstract);
		if ($this->isColumnModified(JournalPeer::SHOW_TITLE)) $criteria->add(JournalPeer::SHOW_TITLE, $this->show_title);
		if ($this->isColumnModified(JournalPeer::SHOW_ABSTRACT)) $criteria->add(JournalPeer::SHOW_ABSTRACT, $this->show_abstract);
		if ($this->isColumnModified(JournalPeer::SHOW_FULLTEXT)) $criteria->add(JournalPeer::SHOW_FULLTEXT, $this->show_fulltext);
		if ($this->isColumnModified(JournalPeer::SHOW_FILE_UPLOAD)) $criteria->add(JournalPeer::SHOW_FILE_UPLOAD, $this->show_file_upload);
		if ($this->isColumnModified(JournalPeer::POST_ORDER_TYPE)) $criteria->add(JournalPeer::POST_ORDER_TYPE, $this->post_order_type);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(JournalPeer::DATABASE_NAME);
		$criteria->add(JournalPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Journal (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setTitle($this->title);
		$copyObj->setTitleSlug($this->title_slug);
		$copyObj->setTextAbstract($this->text_abstract);
		$copyObj->setShowTitle($this->show_title);
		$copyObj->setShowAbstract($this->show_abstract);
		$copyObj->setShowFulltext($this->show_fulltext);
		$copyObj->setShowFileUpload($this->show_file_upload);
		$copyObj->setPostOrderType($this->post_order_type);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getJournalPosts() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addJournalPost($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Journal Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     JournalPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new JournalPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collJournalPosts collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addJournalPosts()
	 */
	public function clearJournalPosts()
	{
		$this->collJournalPosts = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collJournalPosts collection.
	 *
	 * By default this just sets the collJournalPosts collection to an empty array (like clearcollJournalPosts());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initJournalPosts()
	{
		$this->collJournalPosts = new PropelObjectCollection();
		$this->collJournalPosts->setModel('JournalPost');
	}

	/**
	 * Gets an array of JournalPost objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Journal is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array JournalPost[] List of JournalPost objects
	 * @throws     PropelException
	 */
	public function getJournalPosts($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collJournalPosts || null !== $criteria) {
			if ($this->isNew() && null === $this->collJournalPosts) {
				// return empty collection
				$this->initJournalPosts();
			} else {
				$collJournalPosts = JournalPostQuery::create(null, $criteria)
					->filterByJournal($this)
					->find($con);
				if (null !== $criteria) {
					return $collJournalPosts;
				}
				$this->collJournalPosts = $collJournalPosts;
			}
		}
		return $this->collJournalPosts;
	}

	/**
	 * Returns the number of related JournalPost objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related JournalPost objects.
	 * @throws     PropelException
	 */
	public function countJournalPosts(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collJournalPosts || null !== $criteria) {
			if ($this->isNew() && null === $this->collJournalPosts) {
				return 0;
			} else {
				$query = JournalPostQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByJournal($this)
					->count($con);
			}
		} else {
			return count($this->collJournalPosts);
		}
	}

	/**
	 * Method called to associate a JournalPost object to this object
	 * through the JournalPost foreign key attribute.
	 *
	 * @param      JournalPost $l JournalPost
	 * @return     void
	 * @throws     PropelException
	 */
	public function addJournalPost(JournalPost $l)
	{
		if ($this->collJournalPosts === null) {
			$this->initJournalPosts();
		}
		if (!$this->collJournalPosts->contains($l)) { // only add it if the **same** object is not already associated
			$this->collJournalPosts[]= $l;
			$l->setJournal($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Journal is new, it will return
	 * an empty collection; or if this Journal has previously
	 * been saved, it will retrieve related JournalPosts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Journal.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array JournalPost[] List of JournalPost objects
	 */
	public function getJournalPostsJoinFiles($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = JournalPostQuery::create(null, $criteria);
		$query->joinWith('Files', $join_behavior);

		return $this->getJournalPosts($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Journal is new, it will return
	 * an empty collection; or if this Journal has previously
	 * been saved, it will retrieve related JournalPosts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Journal.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array JournalPost[] List of JournalPost objects
	 */
	public function getJournalPostsJoinAdminsRelatedByCreatorUserId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = JournalPostQuery::create(null, $criteria);
		$query->joinWith('AdminsRelatedByCreatorUserId', $join_behavior);

		return $this->getJournalPosts($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Journal is new, it will return
	 * an empty collection; or if this Journal has previously
	 * been saved, it will retrieve related JournalPosts from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Journal.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array JournalPost[] List of JournalPost objects
	 */
	public function getJournalPostsJoinAdminsRelatedByEditorUserId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = JournalPostQuery::create(null, $criteria);
		$query->joinWith('AdminsRelatedByEditorUserId', $join_behavior);

		return $this->getJournalPosts($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->title = null;
		$this->title_slug = null;
		$this->text_abstract = null;
		$this->show_title = null;
		$this->show_abstract = null;
		$this->show_fulltext = null;
		$this->show_file_upload = null;
		$this->post_order_type = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collJournalPosts) {
				foreach ((array) $this->collJournalPosts as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collJournalPosts = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		throw new PropelException('Call to undefined method: ' . $name);
	}

} // BaseJournal
