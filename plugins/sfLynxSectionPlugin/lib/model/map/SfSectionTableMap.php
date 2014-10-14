<?php


/**
 * This class defines the structure of the 'sf_section' table.
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
class SfSectionTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfLynxSectionPlugin.lib.model.map.SfSectionTableMap';

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
		$this->setName('sf_section');
		$this->setPhpName('SfSection');
		$this->setClassname('SfSection');
		$this->setPackage('plugins.sfLynxSectionPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addColumn('ID_PROFILE', 'IdProfile', 'INTEGER', true, 11, null);
		$this->addColumn('ID_PARENT', 'IdParent', 'INTEGER', false, 11, 0);
		$this->addColumn('ID_BANNER', 'IdBanner', 'INTEGER', true, 11, null);
		$this->addColumn('POSITION', 'Position', 'INTEGER', false, 11, null);
		$this->addColumn('CONTROL', 'Control', 'CHAR', false, 1, '0');
		$this->addColumn('SW_MENU', 'SwMenu', 'VARCHAR', false, 200, null);
		$this->addColumn('STATUS', 'Status', 'CHAR', false, 1, '0');
		$this->addColumn('HOME', 'Home', 'CHAR', false, 1, '0');
		$this->addColumn('SPECIAL_PAGE', 'SpecialPage', 'VARCHAR', false, 50, null);
		$this->addColumn('SHOW_TEXT', 'ShowText', 'CHAR', false, 1, '0');
		$this->addColumn('ONLY_COMPLEMENT', 'OnlyComplement', 'CHAR', false, 1, '0');
		$this->addColumn('URL_EXTERNA', 'UrlExterna', 'VARCHAR', true, 150, null);
		$this->addColumn('DELETE', 'Delete', 'CHAR', true, 1, '0');
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

} // SfSectionTableMap
