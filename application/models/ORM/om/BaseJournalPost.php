<?php


/**
 * Base class that represents a row from the 'journal_post' table.
 *
 * 
 *
 * @package    propel.generator.ORM.om
 */
abstract class BaseJournalPost extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'JournalPostPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        JournalPostPeer
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
	 * The value for the content field.
	 * @var        string
	 */
	protected $content;

	/**
	 * The value for the tags field.
	 * @var        string
	 */
	protected $tags;

	/**
	 * The value for the creator_user_id field.
	 * @var        int
	 */
	protected $creator_user_id;

	/**
	 * The value for the created field.
	 * @var        string
	 */
	protected $created;

	/**
	 * The value for the editor_user_id field.
	 * @var        int
	 */
	protected $editor_user_id;

	/**
	 * The value for the edited field.
	 * @var        string
	 */
	protected $edited;

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
	 * The value for the rank field.
	 * @var        int
	 */
	protected $rank;

	/**
	 * The value for the is_public field.
	 * @var        int
	 */
	protected $is_public;

	/**
	 * The value for the journal_id field.
	 * @var        int
	 */
	protected $journal_id;

	/**
	 * The value for the file_id field.
	 * @var        int
	 */
	protected $file_id;

	/**
	 * @var        Files
	 */
	protected $aFiles;

	/**
	 * @var        Admins
	 */
	protected $aAdminsRelatedByCreatorUserId;

	/**
	 * @var        Admins
	 */
	protected $aAdminsRelatedByEditorUserId;

	/**
	 * @var        Journal
	 */
	protected $aJournal;

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
	 * Get the [content] column value.
	 * 
	 * @return     string
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Get the [tags] column value.
	 * 
	 * @return     string
	 */
	public function getTags()
	{
		return $this->tags;
	}

	/**
	 * Get the [creator_user_id] column value.
	 * 
	 * @return     int
	 */
	public function getCreatorUserId()
	{
		return $this->creator_user_id;
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
	 * Get the [editor_user_id] column value.
	 * 
	 * @return     int
	 */
	public function getEditorUserId()
	{
		return $this->editor_user_id;
	}

	/**
	 * Get the [optionally formatted] temporal [edited] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getEdited($format = 'Y-m-d H:i:s')
	{
		if ($this->edited === null) {
			return null;
		}


		if ($this->edited === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->edited);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->edited, true), $x);
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
	 * Get the [journal_id] column value.
	 * 
	 * @return     int
	 */
	public function getJournalId()
	{
		return $this->journal_id;
	}

	/**
	 * Get the [file_id] column value.
	 * 
	 * @return     int
	 */
	public function getFileId()
	{
		return $this->file_id;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = JournalPostPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [title] column.
	 * 
	 * @param      string $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setTitle($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = JournalPostPeer::TITLE;
		}

		return $this;
	} // setTitle()

	/**
	 * Set the value of [title_slug] column.
	 * 
	 * @param      string $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setTitleSlug($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->title_slug !== $v) {
			$this->title_slug = $v;
			$this->modifiedColumns[] = JournalPostPeer::TITLE_SLUG;
		}

		return $this;
	} // setTitleSlug()

	/**
	 * Set the value of [text_abstract] column.
	 * 
	 * @param      string $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setTextAbstract($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->text_abstract !== $v) {
			$this->text_abstract = $v;
			$this->modifiedColumns[] = JournalPostPeer::TEXT_ABSTRACT;
		}

		return $this;
	} // setTextAbstract()

	/**
	 * Set the value of [content] column.
	 * 
	 * @param      string $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setContent($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->content !== $v) {
			$this->content = $v;
			$this->modifiedColumns[] = JournalPostPeer::CONTENT;
		}

		return $this;
	} // setContent()

	/**
	 * Set the value of [tags] column.
	 * 
	 * @param      string $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setTags($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tags !== $v) {
			$this->tags = $v;
			$this->modifiedColumns[] = JournalPostPeer::TAGS;
		}

		return $this;
	} // setTags()

	/**
	 * Set the value of [creator_user_id] column.
	 * 
	 * @param      int $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setCreatorUserId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->creator_user_id !== $v) {
			$this->creator_user_id = $v;
			$this->modifiedColumns[] = JournalPostPeer::CREATOR_USER_ID;
		}

		if ($this->aAdminsRelatedByCreatorUserId !== null && $this->aAdminsRelatedByCreatorUserId->getId() !== $v) {
			$this->aAdminsRelatedByCreatorUserId = null;
		}

		return $this;
	} // setCreatorUserId()

	/**
	 * Sets the value of [created] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     JournalPost The current object (for fluent API support)
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
				$this->modifiedColumns[] = JournalPostPeer::CREATED;
			}
		} // if either are not null

		return $this;
	} // setCreated()

	/**
	 * Set the value of [editor_user_id] column.
	 * 
	 * @param      int $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setEditorUserId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->editor_user_id !== $v) {
			$this->editor_user_id = $v;
			$this->modifiedColumns[] = JournalPostPeer::EDITOR_USER_ID;
		}

		if ($this->aAdminsRelatedByEditorUserId !== null && $this->aAdminsRelatedByEditorUserId->getId() !== $v) {
			$this->aAdminsRelatedByEditorUserId = null;
		}

		return $this;
	} // setEditorUserId()

	/**
	 * Sets the value of [edited] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setEdited($v)
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

		if ( $this->edited !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->edited !== null && $tmpDt = new DateTime($this->edited)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->edited = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = JournalPostPeer::EDITED;
			}
		} // if either are not null

		return $this;
	} // setEdited()

	/**
	 * Sets the value of [start_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     JournalPost The current object (for fluent API support)
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
				$this->modifiedColumns[] = JournalPostPeer::START_DATE;
			}
		} // if either are not null

		return $this;
	} // setStartDate()

	/**
	 * Sets the value of [end_date] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     JournalPost The current object (for fluent API support)
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
				$this->modifiedColumns[] = JournalPostPeer::END_DATE;
			}
		} // if either are not null

		return $this;
	} // setEndDate()

	/**
	 * Set the value of [rank] column.
	 * 
	 * @param      int $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setRank($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->rank !== $v) {
			$this->rank = $v;
			$this->modifiedColumns[] = JournalPostPeer::RANK;
		}

		return $this;
	} // setRank()

	/**
	 * Set the value of [is_public] column.
	 * 
	 * @param      int $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setIsPublic($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->is_public !== $v) {
			$this->is_public = $v;
			$this->modifiedColumns[] = JournalPostPeer::IS_PUBLIC;
		}

		return $this;
	} // setIsPublic()

	/**
	 * Set the value of [journal_id] column.
	 * 
	 * @param      int $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setJournalId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->journal_id !== $v) {
			$this->journal_id = $v;
			$this->modifiedColumns[] = JournalPostPeer::JOURNAL_ID;
		}

		if ($this->aJournal !== null && $this->aJournal->getId() !== $v) {
			$this->aJournal = null;
		}

		return $this;
	} // setJournalId()

	/**
	 * Set the value of [file_id] column.
	 * 
	 * @param      int $v new value
	 * @return     JournalPost The current object (for fluent API support)
	 */
	public function setFileId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->file_id !== $v) {
			$this->file_id = $v;
			$this->modifiedColumns[] = JournalPostPeer::FILE_ID;
		}

		if ($this->aFiles !== null && $this->aFiles->getId() !== $v) {
			$this->aFiles = null;
		}

		return $this;
	} // setFileId()

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
			$this->content = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->tags = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->creator_user_id = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->created = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->editor_user_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->edited = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->start_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->end_date = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->rank = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->is_public = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
			$this->journal_id = ($row[$startcol + 14] !== null) ? (int) $row[$startcol + 14] : null;
			$this->file_id = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 16; // 16 = JournalPostPeer::NUM_COLUMNS - JournalPostPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating JournalPost object", $e);
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

		if ($this->aAdminsRelatedByCreatorUserId !== null && $this->creator_user_id !== $this->aAdminsRelatedByCreatorUserId->getId()) {
			$this->aAdminsRelatedByCreatorUserId = null;
		}
		if ($this->aAdminsRelatedByEditorUserId !== null && $this->editor_user_id !== $this->aAdminsRelatedByEditorUserId->getId()) {
			$this->aAdminsRelatedByEditorUserId = null;
		}
		if ($this->aJournal !== null && $this->journal_id !== $this->aJournal->getId()) {
			$this->aJournal = null;
		}
		if ($this->aFiles !== null && $this->file_id !== $this->aFiles->getId()) {
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
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = JournalPostPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aFiles = null;
			$this->aAdminsRelatedByCreatorUserId = null;
			$this->aAdminsRelatedByEditorUserId = null;
			$this->aJournal = null;
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
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				JournalPostQuery::create()
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
			$con = Propel::getConnection(JournalPostPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
				JournalPostPeer::addInstanceToPool($this);
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

			if ($this->aAdminsRelatedByCreatorUserId !== null) {
				if ($this->aAdminsRelatedByCreatorUserId->isModified() || $this->aAdminsRelatedByCreatorUserId->isNew()) {
					$affectedRows += $this->aAdminsRelatedByCreatorUserId->save($con);
				}
				$this->setAdminsRelatedByCreatorUserId($this->aAdminsRelatedByCreatorUserId);
			}

			if ($this->aAdminsRelatedByEditorUserId !== null) {
				if ($this->aAdminsRelatedByEditorUserId->isModified() || $this->aAdminsRelatedByEditorUserId->isNew()) {
					$affectedRows += $this->aAdminsRelatedByEditorUserId->save($con);
				}
				$this->setAdminsRelatedByEditorUserId($this->aAdminsRelatedByEditorUserId);
			}

			if ($this->aJournal !== null) {
				if ($this->aJournal->isModified() || $this->aJournal->isNew()) {
					$affectedRows += $this->aJournal->save($con);
				}
				$this->setJournal($this->aJournal);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = JournalPostPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(JournalPostPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.JournalPostPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += JournalPostPeer::doUpdate($this, $con);
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

			if ($this->aAdminsRelatedByCreatorUserId !== null) {
				if (!$this->aAdminsRelatedByCreatorUserId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAdminsRelatedByCreatorUserId->getValidationFailures());
				}
			}

			if ($this->aAdminsRelatedByEditorUserId !== null) {
				if (!$this->aAdminsRelatedByEditorUserId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAdminsRelatedByEditorUserId->getValidationFailures());
				}
			}

			if ($this->aJournal !== null) {
				if (!$this->aJournal->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aJournal->getValidationFailures());
				}
			}


			if (($retval = JournalPostPeer::doValidate($this, $columns)) !== true) {
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
		$pos = JournalPostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getContent();
				break;
			case 5:
				return $this->getTags();
				break;
			case 6:
				return $this->getCreatorUserId();
				break;
			case 7:
				return $this->getCreated();
				break;
			case 8:
				return $this->getEditorUserId();
				break;
			case 9:
				return $this->getEdited();
				break;
			case 10:
				return $this->getStartDate();
				break;
			case 11:
				return $this->getEndDate();
				break;
			case 12:
				return $this->getRank();
				break;
			case 13:
				return $this->getIsPublic();
				break;
			case 14:
				return $this->getJournalId();
				break;
			case 15:
				return $this->getFileId();
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
		$keys = JournalPostPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getTitleSlug(),
			$keys[3] => $this->getTextAbstract(),
			$keys[4] => $this->getContent(),
			$keys[5] => $this->getTags(),
			$keys[6] => $this->getCreatorUserId(),
			$keys[7] => $this->getCreated(),
			$keys[8] => $this->getEditorUserId(),
			$keys[9] => $this->getEdited(),
			$keys[10] => $this->getStartDate(),
			$keys[11] => $this->getEndDate(),
			$keys[12] => $this->getRank(),
			$keys[13] => $this->getIsPublic(),
			$keys[14] => $this->getJournalId(),
			$keys[15] => $this->getFileId(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aFiles) {
				$result['Files'] = $this->aFiles->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aAdminsRelatedByCreatorUserId) {
				$result['AdminsRelatedByCreatorUserId'] = $this->aAdminsRelatedByCreatorUserId->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aAdminsRelatedByEditorUserId) {
				$result['AdminsRelatedByEditorUserId'] = $this->aAdminsRelatedByEditorUserId->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aJournal) {
				$result['Journal'] = $this->aJournal->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = JournalPostPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setContent($value);
				break;
			case 5:
				$this->setTags($value);
				break;
			case 6:
				$this->setCreatorUserId($value);
				break;
			case 7:
				$this->setCreated($value);
				break;
			case 8:
				$this->setEditorUserId($value);
				break;
			case 9:
				$this->setEdited($value);
				break;
			case 10:
				$this->setStartDate($value);
				break;
			case 11:
				$this->setEndDate($value);
				break;
			case 12:
				$this->setRank($value);
				break;
			case 13:
				$this->setIsPublic($value);
				break;
			case 14:
				$this->setJournalId($value);
				break;
			case 15:
				$this->setFileId($value);
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
		$keys = JournalPostPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitleSlug($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTextAbstract($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setContent($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTags($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatorUserId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreated($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setEditorUserId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEdited($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setStartDate($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setEndDate($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setRank($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setIsPublic($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setJournalId($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setFileId($arr[$keys[15]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(JournalPostPeer::DATABASE_NAME);

		if ($this->isColumnModified(JournalPostPeer::ID)) $criteria->add(JournalPostPeer::ID, $this->id);
		if ($this->isColumnModified(JournalPostPeer::TITLE)) $criteria->add(JournalPostPeer::TITLE, $this->title);
		if ($this->isColumnModified(JournalPostPeer::TITLE_SLUG)) $criteria->add(JournalPostPeer::TITLE_SLUG, $this->title_slug);
		if ($this->isColumnModified(JournalPostPeer::TEXT_ABSTRACT)) $criteria->add(JournalPostPeer::TEXT_ABSTRACT, $this->text_abstract);
		if ($this->isColumnModified(JournalPostPeer::CONTENT)) $criteria->add(JournalPostPeer::CONTENT, $this->content);
		if ($this->isColumnModified(JournalPostPeer::TAGS)) $criteria->add(JournalPostPeer::TAGS, $this->tags);
		if ($this->isColumnModified(JournalPostPeer::CREATOR_USER_ID)) $criteria->add(JournalPostPeer::CREATOR_USER_ID, $this->creator_user_id);
		if ($this->isColumnModified(JournalPostPeer::CREATED)) $criteria->add(JournalPostPeer::CREATED, $this->created);
		if ($this->isColumnModified(JournalPostPeer::EDITOR_USER_ID)) $criteria->add(JournalPostPeer::EDITOR_USER_ID, $this->editor_user_id);
		if ($this->isColumnModified(JournalPostPeer::EDITED)) $criteria->add(JournalPostPeer::EDITED, $this->edited);
		if ($this->isColumnModified(JournalPostPeer::START_DATE)) $criteria->add(JournalPostPeer::START_DATE, $this->start_date);
		if ($this->isColumnModified(JournalPostPeer::END_DATE)) $criteria->add(JournalPostPeer::END_DATE, $this->end_date);
		if ($this->isColumnModified(JournalPostPeer::RANK)) $criteria->add(JournalPostPeer::RANK, $this->rank);
		if ($this->isColumnModified(JournalPostPeer::IS_PUBLIC)) $criteria->add(JournalPostPeer::IS_PUBLIC, $this->is_public);
		if ($this->isColumnModified(JournalPostPeer::JOURNAL_ID)) $criteria->add(JournalPostPeer::JOURNAL_ID, $this->journal_id);
		if ($this->isColumnModified(JournalPostPeer::FILE_ID)) $criteria->add(JournalPostPeer::FILE_ID, $this->file_id);

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
		$criteria = new Criteria(JournalPostPeer::DATABASE_NAME);
		$criteria->add(JournalPostPeer::ID, $this->id);

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
	 * @param      object $copyObj An object of JournalPost (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setTitle($this->title);
		$copyObj->setTitleSlug($this->title_slug);
		$copyObj->setTextAbstract($this->text_abstract);
		$copyObj->setContent($this->content);
		$copyObj->setTags($this->tags);
		$copyObj->setCreatorUserId($this->creator_user_id);
		$copyObj->setCreated($this->created);
		$copyObj->setEditorUserId($this->editor_user_id);
		$copyObj->setEdited($this->edited);
		$copyObj->setStartDate($this->start_date);
		$copyObj->setEndDate($this->end_date);
		$copyObj->setRank($this->rank);
		$copyObj->setIsPublic($this->is_public);
		$copyObj->setJournalId($this->journal_id);
		$copyObj->setFileId($this->file_id);

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
	 * @return     JournalPost Clone of current object.
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
	 * @return     JournalPostPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new JournalPostPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Files object.
	 *
	 * @param      Files $v
	 * @return     JournalPost The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setFiles(Files $v = null)
	{
		if ($v === null) {
			$this->setFileId(NULL);
		} else {
			$this->setFileId($v->getId());
		}

		$this->aFiles = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Files object, it will not be re-added.
		if ($v !== null) {
			$v->addJournalPost($this);
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
		if ($this->aFiles === null && ($this->file_id !== null)) {
			$this->aFiles = FilesQuery::create()->findPk($this->file_id, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aFiles->addJournalPosts($this);
			 */
		}
		return $this->aFiles;
	}

	/**
	 * Declares an association between this object and a Admins object.
	 *
	 * @param      Admins $v
	 * @return     JournalPost The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAdminsRelatedByCreatorUserId(Admins $v = null)
	{
		if ($v === null) {
			$this->setCreatorUserId(NULL);
		} else {
			$this->setCreatorUserId($v->getId());
		}

		$this->aAdminsRelatedByCreatorUserId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Admins object, it will not be re-added.
		if ($v !== null) {
			$v->addJournalPostRelatedByCreatorUserId($this);
		}

		return $this;
	}


	/**
	 * Get the associated Admins object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Admins The associated Admins object.
	 * @throws     PropelException
	 */
	public function getAdminsRelatedByCreatorUserId(PropelPDO $con = null)
	{
		if ($this->aAdminsRelatedByCreatorUserId === null && ($this->creator_user_id !== null)) {
			$this->aAdminsRelatedByCreatorUserId = AdminsQuery::create()->findPk($this->creator_user_id, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAdminsRelatedByCreatorUserId->addJournalPostsRelatedByCreatorUserId($this);
			 */
		}
		return $this->aAdminsRelatedByCreatorUserId;
	}

	/**
	 * Declares an association between this object and a Admins object.
	 *
	 * @param      Admins $v
	 * @return     JournalPost The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setAdminsRelatedByEditorUserId(Admins $v = null)
	{
		if ($v === null) {
			$this->setEditorUserId(NULL);
		} else {
			$this->setEditorUserId($v->getId());
		}

		$this->aAdminsRelatedByEditorUserId = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Admins object, it will not be re-added.
		if ($v !== null) {
			$v->addJournalPostRelatedByEditorUserId($this);
		}

		return $this;
	}


	/**
	 * Get the associated Admins object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Admins The associated Admins object.
	 * @throws     PropelException
	 */
	public function getAdminsRelatedByEditorUserId(PropelPDO $con = null)
	{
		if ($this->aAdminsRelatedByEditorUserId === null && ($this->editor_user_id !== null)) {
			$this->aAdminsRelatedByEditorUserId = AdminsQuery::create()->findPk($this->editor_user_id, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aAdminsRelatedByEditorUserId->addJournalPostsRelatedByEditorUserId($this);
			 */
		}
		return $this->aAdminsRelatedByEditorUserId;
	}

	/**
	 * Declares an association between this object and a Journal object.
	 *
	 * @param      Journal $v
	 * @return     JournalPost The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setJournal(Journal $v = null)
	{
		if ($v === null) {
			$this->setJournalId(NULL);
		} else {
			$this->setJournalId($v->getId());
		}

		$this->aJournal = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Journal object, it will not be re-added.
		if ($v !== null) {
			$v->addJournalPost($this);
		}

		return $this;
	}


	/**
	 * Get the associated Journal object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Journal The associated Journal object.
	 * @throws     PropelException
	 */
	public function getJournal(PropelPDO $con = null)
	{
		if ($this->aJournal === null && ($this->journal_id !== null)) {
			$this->aJournal = JournalQuery::create()->findPk($this->journal_id, $con);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aJournal->addJournalPosts($this);
			 */
		}
		return $this->aJournal;
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
		$this->content = null;
		$this->tags = null;
		$this->creator_user_id = null;
		$this->created = null;
		$this->editor_user_id = null;
		$this->edited = null;
		$this->start_date = null;
		$this->end_date = null;
		$this->rank = null;
		$this->is_public = null;
		$this->journal_id = null;
		$this->file_id = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
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
		$this->aAdminsRelatedByCreatorUserId = null;
		$this->aAdminsRelatedByEditorUserId = null;
		$this->aJournal = null;
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

} // BaseJournalPost
