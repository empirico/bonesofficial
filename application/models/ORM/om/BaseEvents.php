<?php


/**
 * Base class that represents a row from the 'events' table.
 *
 * 
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseEvents extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'EventsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        EventsPeer
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
	 * The value for the venue field.
	 * @var        string
	 */
	protected $venue;

	/**
	 * The value for the address field.
	 * @var        string
	 */
	protected $address;

	/**
	 * The value for the created field.
	 * @var        string
	 */
	protected $created;

	/**
	 * The value for the start_date field.
	 * @var        string
	 */
	protected $start_date;

	/**
	 * The value for the end_date field.
	 * @var        string
	 */
	protected $end_date;

	/**
	 * The value for the image_id field.
	 * @var        int
	 */
	protected $image_id;

	/**
	 * The value for the is_public field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $is_public;

	/**
	 * The value for the event_type field.
	 * @var        string
	 */
	protected $event_type;

	/**
	 * The value for the facebook_id field.
	 * @var        string
	 */
	protected $facebook_id;

	/**
	 * @var        Files
	 */
	protected $aFiles;

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
		$this->is_public = 0;
	}

	/**
	 * Initializes internal state of BaseEvents object.
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
	 * Get the [venue] column value.
	 * 
	 * @return     string
	 */
	public function getVenue()
	{
		return $this->venue;
	}

	/**
	 * Get the [address] column value.
	 * 
	 * @return     string
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the [optionally formatted] temporal [created] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreated($format = 'Y-m-d H:i:s')
	{
		if ($this->created === null) {
			return null;
		}


		if ($this->created === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [start_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getStartDate($format = 'Y-m-d H:i:s')
	{
		if ($this->start_date === null) {
			return null;
		}


		if ($this->start_date === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->start_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->start_date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [end_date] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getEndDate($format = 'Y-m-d H:i:s')
	{
		if ($this->end_date === null) {
			return null;
		}


		if ($this->end_date === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->end_date);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->end_date, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [image_id] column value.
	 * 
	 * @return     int
	 */
	public function getImageId()
	{
		return $this->image_id;
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
	 * Get the [event_type] column value.
	 * 
	 * @return     string
	 */
	public function getEventType()
	{
		return $this->event_type;
	}

	/**
	 * Get the [facebook_id] column value.
	 * 
	 * @return     string
	 */
	public function getFacebookId()
	{
		return $this->facebook_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Events The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EventsPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     Events The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = EventsPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [venue] column.
	 * 
	 * @param      string $v new value
	 * @return     Events The current object (for fluent API support)
	 */
	public function setVenue($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->venue !== $v) {
			$this->venue = $v;
			$this->modifiedColumns[] = EventsPeer::VENUE;
		}

		return $this;
	} // setVenue()

	/**
	 * Set the value of [address] column.
	 * 
	 * @param      string $v new value
	 * @return     Events The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[] = EventsPeer::ADDRESS;
		}

		return $this;
	} // setAddress()

	/**
	 * Sets the value of [created] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Events The current object (for fluent API support)
	 */
	public function setCreated($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->created !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->created !== null && $tmpDt = new DateTime($this->created)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->created = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = EventsPeer::CREATED;
			}
		} // if either are not null

		return $this;
	} // setCreated()

	/**
	 * Sets the value of [start_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Events The current object (for fluent API support)
	 */
	public function setStartDate($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->start_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->start_date !== null && $tmpDt = new DateTime($this->start_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->start_date = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = EventsPeer::START_DATE;
			}
		} // if either are not null

		return $this;
	} // setStartDate()

	/**
	 * Sets the value of [end_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     Events The current object (for fluent API support)
	 */
	public function setEndDate($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->end_date !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->end_date !== null && $tmpDt = new DateTime($this->end_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->end_date = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = EventsPeer::END_DATE;
			}
		} // if either are not null

		return $this;
	} // setEndDate()

	/**
	 * Set the value of [image_id] column.
	 * 
	 * @param      int $v new value
	 * @return     Events The current object (for fluent API support)
	 */
	public function setImageId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->image_id !== $v) {
			$this->image_id = $v;
			$this->modifiedColumns[] = EventsPeer::IMAGE_ID;
		}

		if ($this->aFiles !== null && $this->aFiles->getId() !== $v) {
			$this->aFiles = null;
		}

		return $this;
	} // setImageId()

	/**
	 * Set the value of [is_public] column.
	 * 
	 * @param      int $v new value
	 * @return     Events The current object (for fluent API support)
	 */
	public function setIsPublic($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_public !== $v || $this->isNew()) {
			$this->is_public = $v;
			$this->modifiedColumns[] = EventsPeer::IS_PUBLIC;
		}

		return $this;
	} // setIsPublic()

	/**
	 * Set the value of [event_type] column.
	 * 
	 * @param      string $v new value
	 * @return     Events The current object (for fluent API support)
	 */
	public function setEventType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->event_type !== $v) {
			$this->event_type = $v;
			$this->modifiedColumns[] = EventsPeer::EVENT_TYPE;
		}

		return $this;
	} // setEventType()

	/**
	 * Set the value of [facebook_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Events The current object (for fluent API support)
	 */
	public function setFacebookId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->facebook_id !== $v) {
			$this->facebook_id = $v;
			$this->modifiedColumns[] = EventsPeer::FACEBOOK_ID;
		}

		return $this;
	} // setFacebookId()

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
			$this->venue = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->address = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->created = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->start_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->end_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->image_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
			$this->is_public = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->event_type = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->facebook_id = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 11; // 11 = EventsPeer::NUM_COLUMNS - EventsPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Events object", $e);
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

		if ($this->aFiles !== null && $this->image_id !== $this->aFiles->getId()) {
			$this->aFiles = null;
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
			$con = Propel::getConnection(EventsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = EventsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aFiles = null;
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
			$con = Propel::getConnection(EventsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				EventsQuery::create()
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
			$con = Propel::getConnection(EventsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				EventsPeer::addInstanceToPool($this);
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

			if ($this->aFiles !== null) {
				if ($this->aFiles->isModified() || $this->aFiles->isNew()) {
					$affectedRows += $this->aFiles->save($con);
				}
				$this->setFiles($this->aFiles);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = EventsPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(EventsPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.EventsPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += EventsPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
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

			if ($this->aFiles !== null) {
				if (!$this->aFiles->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aFiles->getValidationFailures());
				}
			}


			if (($retval = EventsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = EventsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getVenue();
				break;
			case 3:
				return $this->getAddress();
				break;
			case 4:
				return $this->getCreated();
				break;
			case 5:
				return $this->getStartDate();
				break;
			case 6:
				return $this->getEndDate();
				break;
			case 7:
				return $this->getImageId();
				break;
			case 8:
				return $this->getIsPublic();
				break;
			case 9:
				return $this->getEventType();
				break;
			case 10:
				return $this->getFacebookId();
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
		$keys = EventsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getVenue(),
			$keys[3] => $this->getAddress(),
			$keys[4] => $this->getCreated(),
			$keys[5] => $this->getStartDate(),
			$keys[6] => $this->getEndDate(),
			$keys[7] => $this->getImageId(),
			$keys[8] => $this->getIsPublic(),
			$keys[9] => $this->getEventType(),
			$keys[10] => $this->getFacebookId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aFiles) {
				$result['Files'] = $this->aFiles->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = EventsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setVenue($value);
				break;
			case 3:
				$this->setAddress($value);
				break;
			case 4:
				$this->setCreated($value);
				break;
			case 5:
				$this->setStartDate($value);
				break;
			case 6:
				$this->setEndDate($value);
				break;
			case 7:
				$this->setImageId($value);
				break;
			case 8:
				$this->setIsPublic($value);
				break;
			case 9:
				$this->setEventType($value);
				break;
			case 10:
				$this->setFacebookId($value);
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
		$keys = EventsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setVenue($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAddress($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreated($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setStartDate($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setEndDate($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setImageId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsPublic($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEventType($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFacebookId($arr[$keys[10]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(EventsPeer::DATABASE_NAME);

		if ($this->isColumnModified(EventsPeer::ID)) $criteria->add(EventsPeer::ID, $this->id);
		if ($this->isColumnModified(EventsPeer::TITLE)) $criteria->add(EventsPeer::TITLE, $this->title);
		if ($this->isColumnModified(EventsPeer::VENUE)) $criteria->add(EventsPeer::VENUE, $this->venue);
		if ($this->isColumnModified(EventsPeer::ADDRESS)) $criteria->add(EventsPeer::ADDRESS, $this->address);
		if ($this->isColumnModified(EventsPeer::CREATED)) $criteria->add(EventsPeer::CREATED, $this->created);
		if ($this->isColumnModified(EventsPeer::START_DATE)) $criteria->add(EventsPeer::START_DATE, $this->start_date);
		if ($this->isColumnModified(EventsPeer::END_DATE)) $criteria->add(EventsPeer::END_DATE, $this->end_date);
		if ($this->isColumnModified(EventsPeer::IMAGE_ID)) $criteria->add(EventsPeer::IMAGE_ID, $this->image_id);
		if ($this->isColumnModified(EventsPeer::IS_PUBLIC)) $criteria->add(EventsPeer::IS_PUBLIC, $this->is_public);
		if ($this->isColumnModified(EventsPeer::EVENT_TYPE)) $criteria->add(EventsPeer::EVENT_TYPE, $this->event_type);
		if ($this->isColumnModified(EventsPeer::FACEBOOK_ID)) $criteria->add(EventsPeer::FACEBOOK_ID, $this->facebook_id);

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
		$criteria = new Criteria(EventsPeer::DATABASE_NAME);
		$criteria->add(EventsPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of Events (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setTitle($this->title);
		$copyObj->setVenue($this->venue);
		$copyObj->setAddress($this->address);
		$copyObj->setCreated($this->created);
		$copyObj->setStartDate($this->start_date);
		$copyObj->setEndDate($this->end_date);
		$copyObj->setImageId($this->image_id);
		$copyObj->setIsPublic($this->is_public);
		$copyObj->setEventType($this->event_type);
		$copyObj->setFacebookId($this->facebook_id);

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
	 * @return     Events Clone of current object.
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
	 * @return     EventsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EventsPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Files object.
	 *
	 * @param      Files $v
	 * @return     Events The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setFiles(Files $v = null)
	{
		if ($v === null) {
			$this->setImageId(NULL);
		} else {
			$this->setImageId($v->getId());
		}

		$this->aFiles = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Files object, it will not be re-added.
		if ($v !== null) {
			$v->addEvents($this);
		}

		return $this;
	}


	/**
	 * Get the associated Files object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Files The associated Files object.
	 * @throws     PropelException
	 */
	public function getFiles(PropelPDO $con = null)
	{
		if ($this->aFiles === null && ($this->image_id !== null)) {
			$this->aFiles = FilesQuery::create()->findPk($this->image_id, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aFiles->addEventss($this);
			 */
		}
		return $this->aFiles;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->title = null;
		$this->venue = null;
		$this->address = null;
		$this->created = null;
		$this->start_date = null;
		$this->end_date = null;
		$this->image_id = null;
		$this->is_public = null;
		$this->event_type = null;
		$this->facebook_id = null;
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
		} // if ($deep)

		$this->aFiles = null;
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

} // BaseEvents
