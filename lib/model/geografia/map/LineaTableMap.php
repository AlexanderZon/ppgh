<?php


/**
 * This class defines the structure of the 'linea' table.
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
class LineaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.geografia.map.LineaTableMap';

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
		$this->setName('linea');
		$this->setPhpName('Linea');
		$this->setClassname('Linea');
		$this->setPackage('lib.model.geografia');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_LINEA', 'IdLinea', 'INTEGER', true, 11, null);
		$this->addColumn('NOME_LINEA', 'NomeLinea', 'VARCHAR', true, 20, null);
		$this->addColumn('DESCRICAO', 'Descricao', 'VARCHAR', true, 150, null);
		$this->addColumn('FOTO', 'Foto', 'VARCHAR', true, 20, null);
		$this->addColumn('STATUS', 'Status', 'CHAR', true, null, null);
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

} // LineaTableMap
