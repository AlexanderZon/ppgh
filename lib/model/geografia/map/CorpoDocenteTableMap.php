<?php


/**
 * This class defines the structure of the 'corpo_docente' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 17/10/2013 16:31:43
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.geografia.map
 */
class CorpoDocenteTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.geografia.map.CorpoDocenteTableMap';

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
		$this->setName('corpo_docente');
		$this->setPhpName('CorpoDocente');
		$this->setClassname('CorpoDocente');
		$this->setPackage('lib.model.geografia');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_DOCENTE', 'IdDocente', 'INTEGER', true, 11, null);
		$this->addColumn('NOME_DOCENTE', 'NomeDocente', 'VARCHAR', true, 40, null);
		$this->addColumn('RAMAL', 'Ramal', 'VARCHAR', true, 40, null);
		$this->addColumn('SALA', 'Sala', 'VARCHAR', true, 20, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', true, 100, null);
		$this->addColumn('SITE', 'Site', 'VARCHAR', true, 100, null);
		$this->addColumn('CURRICULO', 'Curriculo', 'VARCHAR', true, 100, null);
		$this->addColumn('PHOTO', 'Photo', 'VARCHAR', true, 100, null);
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

} // CorpoDocenteTableMap
