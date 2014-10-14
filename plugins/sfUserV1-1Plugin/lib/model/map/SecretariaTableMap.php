<?php


/**
 * This class defines the structure of the 'secretaria' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 24/05/2012 21:56:39
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.lynx.map
 */
class SecretariaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.lynx.map.SecretariaTableMap';

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
		$this->setName('secretaria');
		$this->setPhpName('Secretaria');
		$this->setClassname('Secretaria');
		$this->setPackage('lib.model.lynx');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_SECRETARIA', 'IdSecretaria', 'INTEGER', true, 11, null);
		$this->addColumn('SWITCHE', 'Switche', 'VARCHAR', true, 30, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 100, null);
		$this->addColumn('STATUS', 'Status', 'CHAR', true, null, null);
		$this->addColumn('PERMALINK', 'Permalink', 'VARCHAR', true, 100, null);
		$this->addColumn('NOMBRE_COMPLETO', 'NombreCompleto', 'VARCHAR', true, 100, null);
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

} // SecretariaTableMap
