<?php


/**
 * This class defines the structure of the 'sf_section_i18n' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 22/07/2012 05:40:58
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sfLynxSectionPlugin.lib.model.map
 */
class SfSectionI18nTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfLynxSectionPlugin.lib.model.map.SfSectionI18nTableMap';

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
		$this->setName('sf_section_i18n');
		$this->setPhpName('SfSectionI18n');
		$this->setClassname('SfSectionI18n');
		$this->setPackage('plugins.sfLynxSectionPlugin.lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addColumn('NAME_SECTION', 'NameSection', 'VARCHAR', false, 50, null);
		$this->addColumn('DESCRIP_SECTION', 'DescripSection', 'LONGVARCHAR', true, null, null);
		$this->addColumn('META_TITLE', 'MetaTitle', 'VARCHAR', false, 200, null);
		$this->addColumn('META_KEYWORD', 'MetaKeyword', 'VARCHAR', false, 200, null);
		$this->addColumn('META_DESCRIPTION', 'MetaDescription', 'VARCHAR', false, 200, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addPrimaryKey('LANGUAGE', 'Language', 'VARCHAR', true, 7, null);
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

} // SfSectionI18nTableMap
