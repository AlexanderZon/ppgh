<?php


/**
 * This class defines the structure of the 'sf_seccion_archivos' table.
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
 * @package    plugins.sfLynxSectionPlugin.lib.model.map
 */
class SfSeccionArchivosTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfLynxSectionPlugin.lib.model.map.SfSeccionArchivosTableMap';

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
		$this->setName('sf_seccion_archivos');
		$this->setPhpName('SfSeccionArchivos');
		$this->setClassname('SfSeccionArchivos');
		$this->setPackage('plugins.sfLynxSectionPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_SECCION_ARCHIVO', 'IdSeccionArchivo', 'INTEGER', true, 11, null);
		$this->addColumn('ID_SECCION', 'IdSeccion', 'INTEGER', true, 11, null);
		$this->addColumn('ID_ARCHIVO', 'IdArchivo', 'INTEGER', true, 11, null);
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

} // SfSeccionArchivosTableMap
