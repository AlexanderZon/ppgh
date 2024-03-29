<?php


/**
 * This class defines the structure of the 'log_actividades' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 17/10/2013 16:31:44
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.geografia.map
 */
class LogActividadesTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.geografia.map.LogActividadesTableMap';

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
		$this->setName('log_actividades');
		$this->setPhpName('LogActividades');
		$this->setClassname('LogActividades');
		$this->setPackage('lib.model.geografia');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_LOG', 'IdLog', 'INTEGER', true, 11, null);
		$this->addColumn('ID_USER', 'IdUser', 'INTEGER', true, 11, null);
		$this->addColumn('IP', 'Ip', 'VARCHAR', true, 50, null);
		$this->addColumn('MODULO', 'Modulo', 'VARCHAR', true, 50, null);
		$this->addColumn('FECHA', 'Fecha', 'DATE', true, null, null);
		$this->addColumn('HORA', 'Hora', 'VARCHAR', true, 15, null);
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

} // LogActividadesTableMap
