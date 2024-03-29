<?php

/**
 * Base class that represents a row from the 'sf_news_access' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 20/07/2013 14:30:37
 *
 * @package    plugins.sfLynxNewsPlugin.lib.model.om
 */
abstract class BaseSfNewsAccess extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        SfNewsAccessPeer
	 */
	protected static $peer;

	/**
	 * The value for the id_access field.
	 * @var        int
	 */
	protected $id_access;

	/**
	 * The value for the id_nucleo field.
	 * @var        int
	 */
	protected $id_nucleo;

	/**
	 * The value for the id_news field.
	 * @var        int
	 */
	protected $id_news;

	/**
	 * The value for the categoria field.
	 * @var        string
	 */
	protected $categoria;

	/**
	 * @var        LxProfile
	 */
	protected $aLxProfile;

	/**
	 * @var        SfNews
	 */
	protected $aSfNews;

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

	// symfony behavior
	
	const PEER = 'SfNewsAccessPeer';

	/**
	 * Get the [id_access] column value.
	 * 
	 * @return     int
	 */
	public function getIdAccess()
	{
		return $this->id_access;
	}

	/**
	 * Get the [id_nucleo] column value.
	 * 
	 * @return     int
	 */
	public function getIdNucleo()
	{
		return $this->id_nucleo;
	}

	/**
	 * Get the [id_news] column value.
	 * 
	 * @return     int
	 */
	public function getIdNews()
	{
		return $this->id_news;
	}

	/**
	 * Get the [categoria] column value.
	 * 
	 * @return     string
	 */
	public function getCategoria()
	{
		return $this->categoria;
	}

	/**
	 * Set the value of [id_access] column.
	 * 
	 * @param      int $v new value
	 * @return     SfNewsAccess The current object (for fluent API support)
	 */
	public function setIdAccess($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_access !== $v) {
			$this->id_access = $v;
			$this->modifiedColumns[] = SfNewsAccessPeer::ID_ACCESS;
		}

		return $this;
	} // setIdAccess()

	/**
	 * Set the value of [id_nucleo] column.
	 * 
	 * @param      int $v new value
	 * @return     SfNewsAccess The current object (for fluent API support)
	 */
	public function setIdNucleo($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_nucleo !== $v) {
			$this->id_nucleo = $v;
			$this->modifiedColumns[] = SfNewsAccessPeer::ID_NUCLEO;
		}

		if ($this->aLxProfile !== null && $this->aLxProfile->getIdProfile() !== $v) {
			$this->aLxProfile = null;
		}

		return $this;
	} // setIdNucleo()

	/**
	 * Set the value of [id_news] column.
	 * 
	 * @param      int $v new value
	 * @return     SfNewsAccess The current object (for fluent API support)
	 */
	public function setIdNews($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_news !== $v) {
			$this->id_news = $v;
			$this->modifiedColumns[] = SfNewsAccessPeer::ID_NEWS;
		}

		if ($this->aSfNews !== null && $this->aSfNews->getIdNews() !== $v) {
			$this->aSfNews = null;
		}

		return $this;
	} // setIdNews()

	/**
	 * Set the value of [categoria] column.
	 * 
	 * @param      string $v new value
	 * @return     SfNewsAccess The current object (for fluent API support)
	 */
	public function setCategoria($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->categoria !== $v) {
			$this->categoria = $v;
			$this->modifiedColumns[] = SfNewsAccessPeer::CATEGORIA;
		}

		return $this;
	} // setCategoria()

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

			$this->id_access = (isset($row[$startcol + 0]) && $row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->id_nucleo = (isset($row[$startcol + 1]) && $row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_news = (isset($row[$startcol + 2]) && $row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->categoria = (isset($row[$startcol + 3]) && $row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 4; // 4 = SfNewsAccessPeer::NUM_COLUMNS - SfNewsAccessPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating SfNewsAccess object", $e);
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

		if ($this->aLxProfile !== null && $this->id_nucleo !== $this->aLxProfile->getIdProfile()) {
			$this->aLxProfile = null;
		}
		if ($this->aSfNews !== null && $this->id_news !== $this->aSfNews->getIdNews()) {
			$this->aSfNews = null;
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
			$con = Propel::getConnection(SfNewsAccessPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = SfNewsAccessPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aLxProfile = null;
			$this->aSfNews = null;
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
			$con = Propel::getConnection(SfNewsAccessPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseSfNewsAccess:delete:pre') as $callable)
			{
			  if ($ret = call_user_func($callable, $this, $con))
			  {
			    return;
			  }
			}

			if ($ret) {
				SfNewsAccessPeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseSfNewsAccess:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$this->setDeleted(true);
				$con->commit();
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
			$con = Propel::getConnection(SfNewsAccessPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseSfNewsAccess:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			    return $affectedRows;
			  }
			}

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
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseSfNewsAccess:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				SfNewsAccessPeer::addInstanceToPool($this);
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

			if ($this->aLxProfile !== null) {
				if ($this->aLxProfile->isModified() || $this->aLxProfile->isNew()) {
					$affectedRows += $this->aLxProfile->save($con);
				}
				$this->setLxProfile($this->aLxProfile);
			}

			if ($this->aSfNews !== null) {
				if ($this->aSfNews->isModified() || $this->aSfNews->isNew()) {
					$affectedRows += $this->aSfNews->save($con);
				}
				$this->setSfNews($this->aSfNews);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = SfNewsAccessPeer::ID_ACCESS;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SfNewsAccessPeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setIdAccess($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += SfNewsAccessPeer::doUpdate($this, $con);
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

			if ($this->aLxProfile !== null) {
				if (!$this->aLxProfile->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLxProfile->getValidationFailures());
				}
			}

			if ($this->aSfNews !== null) {
				if (!$this->aSfNews->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSfNews->getValidationFailures());
				}
			}


			if (($retval = SfNewsAccessPeer::doValidate($this, $columns)) !== true) {
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
		$pos = SfNewsAccessPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdAccess();
				break;
			case 1:
				return $this->getIdNucleo();
				break;
			case 2:
				return $this->getIdNews();
				break;
			case 3:
				return $this->getCategoria();
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
	 * @param      string $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                        BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. Defaults to BasePeer::TYPE_PHPNAME.
	 * @param      boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns.  Defaults to TRUE.
	 * @return     an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = SfNewsAccessPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdAccess(),
			$keys[1] => $this->getIdNucleo(),
			$keys[2] => $this->getIdNews(),
			$keys[3] => $this->getCategoria(),
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
		$pos = SfNewsAccessPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdAccess($value);
				break;
			case 1:
				$this->setIdNucleo($value);
				break;
			case 2:
				$this->setIdNews($value);
				break;
			case 3:
				$this->setCategoria($value);
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
		$keys = SfNewsAccessPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdAccess($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdNucleo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdNews($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCategoria($arr[$keys[3]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(SfNewsAccessPeer::DATABASE_NAME);

		if ($this->isColumnModified(SfNewsAccessPeer::ID_ACCESS)) $criteria->add(SfNewsAccessPeer::ID_ACCESS, $this->id_access);
		if ($this->isColumnModified(SfNewsAccessPeer::ID_NUCLEO)) $criteria->add(SfNewsAccessPeer::ID_NUCLEO, $this->id_nucleo);
		if ($this->isColumnModified(SfNewsAccessPeer::ID_NEWS)) $criteria->add(SfNewsAccessPeer::ID_NEWS, $this->id_news);
		if ($this->isColumnModified(SfNewsAccessPeer::CATEGORIA)) $criteria->add(SfNewsAccessPeer::CATEGORIA, $this->categoria);

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
		$criteria = new Criteria(SfNewsAccessPeer::DATABASE_NAME);

		$criteria->add(SfNewsAccessPeer::ID_ACCESS, $this->id_access);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdAccess();
	}

	/**
	 * Generic method to set the primary key (id_access column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdAccess($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of SfNewsAccess (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdNucleo($this->id_nucleo);

		$copyObj->setIdNews($this->id_news);

		$copyObj->setCategoria($this->categoria);


		$copyObj->setNew(true);

		$copyObj->setIdAccess(NULL); // this is a auto-increment column, so set to default value

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
	 * @return     SfNewsAccess Clone of current object.
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
	 * @return     SfNewsAccessPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SfNewsAccessPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a LxProfile object.
	 *
	 * @param      LxProfile $v
	 * @return     SfNewsAccess The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setLxProfile(LxProfile $v = null)
	{
		if ($v === null) {
			$this->setIdNucleo(NULL);
		} else {
			$this->setIdNucleo($v->getIdProfile());
		}

		$this->aLxProfile = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the LxProfile object, it will not be re-added.
		if ($v !== null) {
			$v->addSfNewsAccess($this);
		}

		return $this;
	}


	/**
	 * Get the associated LxProfile object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     LxProfile The associated LxProfile object.
	 * @throws     PropelException
	 */
	public function getLxProfile(PropelPDO $con = null)
	{
		if ($this->aLxProfile === null && ($this->id_nucleo !== null)) {
			$this->aLxProfile = LxProfilePeer::retrieveByPk($this->id_nucleo);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aLxProfile->addSfNewsAccesss($this);
			 */
		}
		return $this->aLxProfile;
	}

	/**
	 * Declares an association between this object and a SfNews object.
	 *
	 * @param      SfNews $v
	 * @return     SfNewsAccess The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setSfNews(SfNews $v = null)
	{
		if ($v === null) {
			$this->setIdNews(NULL);
		} else {
			$this->setIdNews($v->getIdNews());
		}

		$this->aSfNews = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the SfNews object, it will not be re-added.
		if ($v !== null) {
			$v->addSfNewsAccess($this);
		}

		return $this;
	}


	/**
	 * Get the associated SfNews object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     SfNews The associated SfNews object.
	 * @throws     PropelException
	 */
	public function getSfNews(PropelPDO $con = null)
	{
		if ($this->aSfNews === null && ($this->id_news !== null)) {
			$this->aSfNews = SfNewsPeer::retrieveByPk($this->id_news);
			/* The following can be used additionally to
			   guarantee the related object contains a reference
			   to this object.  This level of coupling may, however, be
			   undesirable since it could result in an only partially populated collection
			   in the referenced object.
			   $this->aSfNews->addSfNewsAccesss($this);
			 */
		}
		return $this->aSfNews;
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

			$this->aLxProfile = null;
			$this->aSfNews = null;
	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseSfNewsAccess:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseSfNewsAccess::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseSfNewsAccess
