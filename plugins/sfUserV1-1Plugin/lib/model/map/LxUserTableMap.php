<?php


/**
 * This class defines the structure of the 'lx_user' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 14/08/2013 11:03:14
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sfUserV1-1Plugin.lib.model.map
 */
class LxUserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfUserV1-1Plugin.lib.model.map.LxUserTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('lx_user');
		$this->setPhpName('LxUser');
		$this->setClassname('LxUser');
		$this->setPackage('plugins.sfUserV1-1Plugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_USER', 'IdUser', 'INTEGER', true, 10, null);
		$this->addColumn('ID_PROFILE', 'IdProfile', 'INTEGER', true, 11, null);
		$this->addColumn('CODIGO', 'Codigo', 'VARCHAR', true, 20, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', true, 100, null);
		$this->addColumn('LOGIN', 'Login', 'VARCHAR', true, 20, null);
		$this->addColumn('PASSWORD', 'Password', 'LONGVARCHAR', false, null, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 70, null);
		$this->addColumn('PHOTO', 'Photo', 'VARCHAR', true, 100, null);
		$this->addColumn('LAST_ACCESS', 'LastAccess', 'TIMESTAMP', false, null, null);
		$this->addColumn('STATUS', 'Status', 'CHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // LxUserTableMap
