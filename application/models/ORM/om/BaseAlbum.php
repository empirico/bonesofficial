<?php


/**
 * Base class that represents a row from the 'album' table.
 *
 * 
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseAlbum extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'AlbumPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        AlbumPeer
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
	 * The value for the description field.
	 * @var        string
	 */
	protected $description;

	/**
	 * The value for the gallery_id field.
	 * @var        int
	 */
	protected $gallery_id;

	/**
	 * The value for the cover_photo_id field.
	 * @var        int
	 */
	protected $cover_photo_id;

	/**
	 * The value for the rank field.
	 * Note: this column has a database default value of: 1
	 * @var        int
	 */
	protected $rank;

	/**
	 * The value for the is_public field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $is_public;

	/**
	 * The value for the max_width field.
	 * @var        int
	 */
	protected $max_width;

	/**
	 * The value for the max_height field.
	 * @var        int
	 */
	protected $max_height;

	/**
	 * @var        Gallery
	 */
	protected $aGallery;

	/**
	 * @var        array Photos[] Collection to store aggregation of Photos objects.
	 */
	protected $collPhotoss;

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
		$this->rank = 1;
		$this->is_public = 0;
	}

	/**
	 * Initializes internal state of BaseAlbum object.
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
	 * Get the [description] column value.
	 * 
	 * @return     string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [gallery_id] column value.
	 * 
	 * @return     int
	 */
	public function getGalleryId()
	{
		return $this->gallery_id;
	}

	/**
	 * Get the [cover_photo_id] column value.
	 * 
	 * @return     int
	 */
	public function getCoverPhotoId()
	{
		return $this->cover_photo_id;
	}

	/**
	 * Get the [rank] column value.
	 * 
	 * @return     int
	 */
	public function getRank()
	{
		return $this->rank;
	}

	/**
	 * Get the [is_public] column value.
	 * 
	 * @return     int
	 */
	public function getIsPublic()
	{
		return $this->is_public;
	}

	/**
	 * Get the [max_width] column value.
	 * 
	 * @return     int
	 */
	public function getMaxWidth()
	{
		return $this->max_width;
	}

	/**
	 * Get the [max_height] column value.
	 * 
	 * @return     int
	 */
	public function getMaxHeight()
	{
		return $this->max_height;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlbumPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = AlbumPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [description] column.
	 * 
	 * @param      string $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = AlbumPeer::DESCRIPTION;
		}

		return $this;
	} // setDescription()

	/**
	 * Set the value of [gallery_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setGalleryId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->gallery_id !== $v) {
			$this->gallery_id = $v;
			$this->modifiedColumns[] = AlbumPeer::GALLERY_ID;
		}

		if ($this->aGallery !== null && $this->aGallery->getId() !== $v) {
			$this->aGallery = null;
		}

		return $this;
	} // setGalleryId()

	/**
	 * Set the value of [cover_photo_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setCoverPhotoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->cover_photo_id !== $v) {
			$this->cover_photo_id = $v;
			$this->modifiedColumns[] = AlbumPeer::COVER_PHOTO_ID;
		}

		return $this;
	} // setCoverPhotoId()

	/**
	 * Set the value of [rank] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setRank($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rank !== $v || $this->isNew()) {
			$this->rank = $v;
			$this->modifiedColumns[] = AlbumPeer::RANK;
		}

		return $this;
	} // setRank()

	/**
	 * Set the value of [is_public] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setIsPublic($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_public !== $v || $this->isNew()) {
			$this->is_public = $v;
			$this->modifiedColumns[] = AlbumPeer::IS_PUBLIC;
		}

		return $this;
	} // setIsPublic()

	/**
	 * Set the value of [max_width] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setMaxWidth($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->max_width !== $v) {
			$this->max_width = $v;
			$this->modifiedColumns[] = AlbumPeer::MAX_WIDTH;
		}

		return $this;
	} // setMaxWidth()

	/**
	 * Set the value of [max_height] column.
	 * 
	 * @param      int $v new value
	 * @return     Album The current object (for fluent API support)
	 */
	public function setMaxHeight($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->max_height !== $v) {
			$this->max_height = $v;
			$this->modifiedColumns[] = AlbumPeer::MAX_HEIGHT;
		}

		return $this;
	} // setMaxHeight()

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
			if ($this->rank !== 1) {
				return false;
			}

			if ($this->is_public !== 0) {
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
			$this->description = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->gallery_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->cover_photo_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->rank = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->is_public = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->max_width = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->max_height = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 9; // 9 = AlbumPeer::NUM_COLUMNS - AlbumPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Album object", $e);
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

		if ($this->aGallery !== null && $this->gallery_id !== $this->aGallery->getId()) {
			$this->aGallery = null;
		}
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
			$con = Propel::getConnection(AlbumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = AlbumPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aGallery = null;
			$this->collPhotoss = null;

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
			$con = Propel::getConnection(AlbumPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				AlbumQuery::create()
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
			$con = Propel::getConnection(AlbumPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				AlbumPeer::addInstanceToPool($this);
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

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aGallery !== null) {
				if ($this->aGallery->isModified() || $this->aGallery->isNew()) {
					$affectedRows += $this->aGallery->save($con);
				}
				$this->setGallery($this->aGallery);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AlbumPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(AlbumPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.AlbumPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += AlbumPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collPhotoss !== null) {
				foreach ($this->collPhotoss as $referrerFK) {
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


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aGallery !== null) {
				if (!$this->aGallery->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGallery->getValidationFailures());
				}
			}


			if (($retval = AlbumPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPhotoss !== null) {
					foreach ($this->collPhotoss as $referrerFK) {
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
		$pos = AlbumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescription();
				break;
			case 3:
				return $this->getGalleryId();
				break;
			case 4:
				return $this->getCoverPhotoId();
				break;
			case 5:
				return $this->getRank();
				break;
			case 6:
				return $this->getIsPublic();
				break;
			case 7:
				return $this->getMaxWidth();
				break;
			case 8:
				return $this->getMaxHeight();
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
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = AlbumPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getGalleryId(),
			$keys[4] => $this->getCoverPhotoId(),
			$keys[5] => $this->getRank(),
			$keys[6] => $this->getIsPublic(),
			$keys[7] => $this->getMaxWidth(),
			$keys[8] => $this->getMaxHeight(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aGallery) {
				$result['Gallery'] = $this->aGallery->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
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
		$pos = AlbumPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescription($value);
				break;
			case 3:
				$this->setGalleryId($value);
				break;
			case 4:
				$this->setCoverPhotoId($value);
				break;
			case 5:
				$this->setRank($value);
				break;
			case 6:
				$this->setIsPublic($value);
				break;
			case 7:
				$this->setMaxWidth($value);
				break;
			case 8:
				$this->setMaxHeight($value);
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
		$keys = AlbumPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setGalleryId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCoverPhotoId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRank($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIsPublic($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMaxWidth($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setMaxHeight($arr[$keys[8]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(AlbumPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlbumPeer::ID)) $criteria->add(AlbumPeer::ID, $this->id);
		if ($this->isColumnModified(AlbumPeer::TITLE)) $criteria->add(AlbumPeer::TITLE, $this->title);
		if ($this->isColumnModified(AlbumPeer::DESCRIPTION)) $criteria->add(AlbumPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(AlbumPeer::GALLERY_ID)) $criteria->add(AlbumPeer::GALLERY_ID, $this->gallery_id);
		if ($this->isColumnModified(AlbumPeer::COVER_PHOTO_ID)) $criteria->add(AlbumPeer::COVER_PHOTO_ID, $this->cover_photo_id);
		if ($this->isColumnModified(AlbumPeer::RANK)) $criteria->add(AlbumPeer::RANK, $this->rank);
		if ($this->isColumnModified(AlbumPeer::IS_PUBLIC)) $criteria->add(AlbumPeer::IS_PUBLIC, $this->is_public);
		if ($this->isColumnModified(AlbumPeer::MAX_WIDTH)) $criteria->add(AlbumPeer::MAX_WIDTH, $this->max_width);
		if ($this->isColumnModified(AlbumPeer::MAX_HEIGHT)) $criteria->add(AlbumPeer::MAX_HEIGHT, $this->max_height);

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
		$criteria = new Criteria(AlbumPeer::DATABASE_NAME);
		$criteria->add(AlbumPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Album (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setTitle($this->title);
		$copyObj->setDescription($this->description);
		$copyObj->setGalleryId($this->gallery_id);
		$copyObj->setCoverPhotoId($this->cover_photo_id);
		$copyObj->setRank($this->rank);
		$copyObj->setIsPublic($this->is_public);
		$copyObj->setMaxWidth($this->max_width);
		$copyObj->setMaxHeight($this->max_height);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getPhotoss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addPhotos($relObj->copy($deepCopy));
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
	 * @return     Album Clone of current object.
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
	 * @return     AlbumPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new AlbumPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Gallery object.
	 *
	 * @param      Gallery $v
	 * @return     Album The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setGallery(Gallery $v = null)
	{
		if ($v === null) {
			$this->setGalleryId(NULL);
		} else {
			$this->setGalleryId($v->getId());
		}

		$this->aGallery = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Gallery object, it will not be re-added.
		if ($v !== null) {
			$v->addAlbum($this);
		}

		return $this;
	}


	/**
	 * Get the associated Gallery object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Gallery The associated Gallery object.
	 * @throws     PropelException
	 */
	public function getGallery(PropelPDO $con = null)
	{
		if ($this->aGallery === null && ($this->gallery_id !== null)) {
			$this->aGallery = GalleryQuery::create()->findPk($this->gallery_id, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aGallery->addAlbums($this);
			 */
		}
		return $this->aGallery;
	}

	/**
	 * Clears out the collPhotoss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addPhotoss()
	 */
	public function clearPhotoss()
	{
		$this->collPhotoss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collPhotoss collection.
	 *
	 * By default this just sets the collPhotoss collection to an empty array (like clearcollPhotoss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initPhotoss()
	{
		$this->collPhotoss = new PropelObjectCollection();
		$this->collPhotoss->setModel('Photos');
	}

	/**
	 * Gets an array of Photos objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Album is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array Photos[] List of Photos objects
	 * @throws     PropelException
	 */
	public function getPhotoss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collPhotoss || null !== $criteria) {
			if ($this->isNew() && null === $this->collPhotoss) {
				// return empty collection
				$this->initPhotoss();
			} else {
				$collPhotoss = PhotosQuery::create(null, $criteria)
					->filterByAlbum($this)
					->find($con);
				if (null !== $criteria) {
					return $collPhotoss;
				}
				$this->collPhotoss = $collPhotoss;
			}
		}
		return $this->collPhotoss;
	}

	/**
	 * Returns the number of related Photos objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related Photos objects.
	 * @throws     PropelException
	 */
	public function countPhotoss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collPhotoss || null !== $criteria) {
			if ($this->isNew() && null === $this->collPhotoss) {
				return 0;
			} else {
				$query = PhotosQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByAlbum($this)
					->count($con);
			}
		} else {
			return count($this->collPhotoss);
		}
	}

	/**
	 * Method called to associate a Photos object to this object
	 * through the Photos foreign key attribute.
	 *
	 * @param      Photos $l Photos
	 * @return     void
	 * @throws     PropelException
	 */
	public function addPhotos(Photos $l)
	{
		if ($this->collPhotoss === null) {
			$this->initPhotoss();
		}
		if (!$this->collPhotoss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collPhotoss[]= $l;
			$l->setAlbum($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Album is new, it will return
	 * an empty collection; or if this Album has previously
	 * been saved, it will retrieve related Photoss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Album.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array Photos[] List of Photos objects
	 */
	public function getPhotossJoinFiles($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = PhotosQuery::create(null, $criteria);
		$query->joinWith('Files', $join_behavior);

		return $this->getPhotoss($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->title = null;
		$this->description = null;
		$this->gallery_id = null;
		$this->cover_photo_id = null;
		$this->rank = null;
		$this->is_public = null;
		$this->max_width = null;
		$this->max_height = null;
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
			if ($this->collPhotoss) {
				foreach ((array) $this->collPhotoss as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collPhotoss = null;
		$this->aGallery = null;
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

} // BaseAlbum
