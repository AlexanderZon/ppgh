<?php


/**
 * This class defines the structure of the 'lx_module' table.
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
class LxModuleTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfUserV1-1Plugin.lib.model.map.LxModuleTableMap';

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
		$this->setName('lx_module');
		$this->setPhpName('LxModule');
		$this->setClassname('LxModule');
		$this->setPackage('plugins.sfUserV1-1Plugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_MODULE', 'IdModule', 'INTEGER', true, 11, null);
		$this->addColumn('NAME_MODULE', 'NameModule', 'VARCHAR', true, 100, null);
		$this->addColumn('SF_MODULE', 'SfModule', 'VARCHAR', false, 30, null);
		$this->addColumn('CREDENTIAL', 'Credential', 'VARCHAR', false, 30, null);
		$this->addColumn('STATUS', 'Status', 'CHAR', false, null, null);
		$this->addColumn('ID_PARENT', 'IdParent', 'INTEGER', false, 11, null);
		$this->addColumn('POSITION', 'Position', 'INTEGER', false, 11, null);
		$this->addColumn('DELETE', 'Delete', 'CHAR', true, null, null);
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

} // LxModuleTableMap
