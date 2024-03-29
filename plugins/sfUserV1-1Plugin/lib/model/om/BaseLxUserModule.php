<?php

/**
 * Base class that represents a row from the 'lx_user_module' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 14/08/2013 11:03:14
 *
 * @package    plugins.sfUserV1-1Plugin.lib.model.om
 */
abstract class BaseLxUserModule extends BaseObject  implements Persistent {


	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        LxUserModulePeer
	 */
	protected static $peer;

	/**
	 * The value for the id_user_module field.
	 * @var        int
	 */
	protected $id_user_module;

	/**
	 * The value for the id_privilege field.
	 * @var        int
	 */
	protected $id_privilege;

	/**
	 * The value for the id_user field.
	 * @var        int
	 */
	protected $id_user;

	/**
	 * The value for the id_module field.
	 * @var        int
	 */
	protected $id_module;

	/**
	 * The value for the type_vision field.
	 * Note: this column has a database default value of: '0'
	 * @var        string
	 */
	protected $type_vision;

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
	
	const PEER = 'LxUserModulePeer';

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->type_vision = '0';
	}

	/**
	 * Initializes internal state of BaseLxUserModule object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id_user_module] column value.
	 * 
	 * @return     int
	 */
	public function getIdUserModule()
	{
		return $this->id_user_module;
	}

	/**
	 * Get the [id_privilege] column value.
	 * 
	 * @return     int
	 */
	public function getIdPrivilege()
	{
		return $this->id_privilege;
	}

	/**
	 * Get the [id_user] column value.
	 * 
	 * @return     int
	 */
	public function getIdUser()
	{
		return $this->id_user;
	}

	/**
	 * Get the [id_module] column value.
	 * 
	 * @return     int
	 */
	public function getIdModule()
	{
		return $this->id_module;
	}

	/**
	 * Get the [type_vision] column value.
	 * 
	 * @return     string
	 */
	public function getTypeVision()
	{
		return $this->type_vision;
	}

	/**
	 * Set the value of [id_user_module] column.
	 * 
	 * @param      int $v new value
	 * @return     LxUserModule The current object (for fluent API support)
	 */
	public function setIdUserModule($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_user_module !== $v) {
			$this->id_user_module = $v;
			$this->modifiedColumns[] = LxUserModulePeer::ID_USER_MODULE;
		}

		return $this;
	} // setIdUserModule()

	/**
	 * Set the value of [id_privilege] column.
	 * 
	 * @param      int $v new value
	 * @return     LxUserModule The current object (for fluent API support)
	 */
	public function setIdPrivilege($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_privilege !== $v) {
			$this->id_privilege = $v;
			$this->modifiedColumns[] = LxUserModulePeer::ID_PRIVILEGE;
		}

		return $this;
	} // setIdPrivilege()

	/**
	 * Set the value of [id_user] column.
	 * 
	 * @param      int $v new value
	 * @return     LxUserModule The current object (for fluent API support)
	 */
	public function setIdUser($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_user !== $v) {
			$this->id_user = $v;
			$this->modifiedColumns[] = LxUserModulePeer::ID_USER;
		}

		return $this;
	} // setIdUser()

	/**
	 * Set the value of [id_module] column.
	 * 
	 * @param      int $v new value
	 * @return     LxUserModule The current object (for fluent API support)
	 */
	public function setIdModule($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_module !== $v) {
			$this->id_module = $v;
			$this->modifiedColumns[] = LxUserModulePeer::ID_MODULE;
		}

		return $this;
	} // setIdModule()

	/**
	 * Set the value of [type_vision] column.
	 * 
	 * @param      string $v new value
	 * @return     LxUserModule The current object (for fluent API support)
	 */
	public function setTypeVision($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type_vision !== $v || $this->isNew()) {
			$this->type_vision = $v;
			$this->modifiedColumns[] = LxUserModulePeer::TYPE_VISION;
		}

		return $this;
	} // setTypeVision()

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
			if ($this->type_vision !== '0') {
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

			$this->id_user_module = (isset($row[$startcol + 0]) && $row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->id_privilege = (isset($row[$startcol + 1]) && $row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->id_user = (isset($row[$startcol + 2]) && $row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->id_module = (isset($row[$startcol + 3]) && $row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->type_vision = (isset($row[$startcol + 4]) && $row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			// FIXME - using NUM_COLUMNS may be clearer.
			return $startcol + 5; // 5 = LxUserModulePeer::NUM_COLUMNS - LxUserModulePeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating LxUserModule object", $e);
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
			$con = Propel::getConnection(LxUserModulePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = LxUserModulePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

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
			$con = Propel::getConnection(LxUserModulePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseLxUserModule:delete:pre') as $callable)
			{
			  if ($ret = call_user_func($callable, $this, $con))
			  {
			    return;
			  }
			}

			if ($ret) {
				LxUserModulePeer::doDelete($this, $con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseLxUserModule:delete:post') as $callable)
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
			$con = Propel::getConnection(LxUserModulePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseLxUserModule:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseLxUserModule:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				LxUserModulePeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = LxUserModulePeer::ID_USER_MODULE;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LxUserModulePeer::doInsert($this, $con);
					$affectedRows += 1; // we are assuming that there is only 1 row per doInsert() which
										 // should always be true here (even though technically
										 // BasePeer::doInsert() can insert multiple rows).

					$this->setIdUserModule($pk);  //[IMV] update autoincrement primary key

					$this->setNew(false);
				} else {
					$affectedRows += LxUserModulePeer::doUpdate($this, $con);
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


			if (($retval = LxUserModulePeer::doValidate($this, $columns)) !== true) {
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
		$pos = LxUserModulePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdUserModule();
				break;
			case 1:
				return $this->getIdPrivilege();
				break;
			case 2:
				return $this->getIdUser();
				break;
			case 3:
				return $this->getIdModule();
				break;
			case 4:
				return $this->getTypeVision();
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
		$keys = LxUserModulePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getIdUserModule(),
			$keys[1] => $this->getIdPrivilege(),
			$keys[2] => $this->getIdUser(),
			$keys[3] => $this->getIdModule(),
			$keys[4] => $this->getTypeVision(),
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
		$pos = LxUserModulePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdUserModule($value);
				break;
			case 1:
				$this->setIdPrivilege($value);
				break;
			case 2:
				$this->setIdUser($value);
				break;
			case 3:
				$this->setIdModule($value);
				break;
			case 4:
				$this->setTypeVision($value);
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
		$keys = LxUserModulePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setIdUserModule($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdPrivilege($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdUser($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdModule($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTypeVision($arr[$keys[4]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(LxUserModulePeer::DATABASE_NAME);

		if ($this->isColumnModified(LxUserModulePeer::ID_USER_MODULE)) $criteria->add(LxUserModulePeer::ID_USER_MODULE, $this->id_user_module);
		if ($this->isColumnModified(LxUserModulePeer::ID_PRIVILEGE)) $criteria->add(LxUserModulePeer::ID_PRIVILEGE, $this->id_privilege);
		if ($this->isColumnModified(LxUserModulePeer::ID_USER)) $criteria->add(LxUserModulePeer::ID_USER, $this->id_user);
		if ($this->isColumnModified(LxUserModulePeer::ID_MODULE)) $criteria->add(LxUserModulePeer::ID_MODULE, $this->id_module);
		if ($this->isColumnModified(LxUserModulePeer::TYPE_VISION)) $criteria->add(LxUserModulePeer::TYPE_VISION, $this->type_vision);

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
		$criteria = new Criteria(LxUserModulePeer::DATABASE_NAME);

		$criteria->add(LxUserModulePeer::ID_USER_MODULE, $this->id_user_module);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getIdUserModule();
	}

	/**
	 * Generic method to set the primary key (id_user_module column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setIdUserModule($key);
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of LxUserModule (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdPrivilege($this->id_privilege);

		$copyObj->setIdUser($this->id_user);

		$copyObj->setIdModule($this->id_module);

		$copyObj->setTypeVision($this->type_vision);


		$copyObj->setNew(true);

		$copyObj->setIdUserModule(NULL); // this is a auto-increment column, so set to default value

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
	 * @return     LxUserModule Clone of current object.
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
	 * @return     LxUserModulePeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new LxUserModulePeer();
		}
		return self::$peer;
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

	}

	// symfony_behaviors behavior
	
	/**
	 * Calls methods defined via {@link sfMixer}.
	 */
	public function __call($method, $arguments)
	{
	  if (!$callable = sfMixer::getCallable('BaseLxUserModule:'.$method))
	  {
	    throw new sfException(sprintf('Call to undefined method BaseLxUserModule::%s', $method));
	  }
	
	  array_unshift($arguments, $this);
	
	  return call_user_func_array($callable, $arguments);
	}

} // BaseLxUserModule
