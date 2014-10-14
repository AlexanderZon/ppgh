<?php


/**
 * This class defines the structure of the 'sf_news' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 14/08/2013 11:03:13
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sfLynxNewsPlugin.lib.model.map
 */
class SfNewsTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfLynxNewsPlugin.lib.model.map.SfNewsTableMap';

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
		$this->setName('sf_news');
		$this->setPhpName('SfNews');
		$this->setClassname('SfNews');
		$this->setPackage('plugins.sfLynxNewsPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_NEWS', 'IdNews', 'INTEGER', true, 10, null);
		$this->addColumn('ID_PROFILE', 'IdProfile', 'INTEGER', true, 10, 0);
		$this->addColumn('STATUS', 'Status', 'INTEGER', true, 10, 0);
		$this->addColumn('FLAG_ULTIMA_NOTICIA', 'FlagUltimaNoticia', 'INTEGER', true, 10, 0);
		$this->addColumn('HOME', 'Home', 'CHAR', true, null, '0');
		$this->addColumn('IMAGE', 'Image', 'VARCHAR', true, 50, null);
		$this->addColumn('DATE', 'Date', 'DATE', true, null, null);
		$this->addColumn('CATEGORY', 'Category', 'INTEGER', true, 10, 0);
		$this->addColumn('POSITION_PROFILE', 'PositionProfile', 'INTEGER', true, 1, 0);
		$this->addColumn('ORDEM_DESTAQUE', 'OrdemDestaque', 'INTEGER', true, 2, 99);
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

} // SfNewsTableMap
