<?php


/**
 * This class defines the structure of the 'sf_news_album' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 20/07/2013 14:30:37
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sfLynxNewsPlugin.lib.model.map
 */
class SfNewsAlbumTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfLynxNewsPlugin.lib.model.map.SfNewsAlbumTableMap';

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
		$this->setName('sf_news_album');
		$this->setPhpName('SfNewsAlbum');
		$this->setClassname('SfNewsAlbum');
		$this->setPackage('plugins.sfLynxNewsPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID_NEWS_ALBUM', 'IdNewsAlbum', 'INTEGER', true, 11, null);
		$this->addColumn('ID_NEWS', 'IdNews', 'INTEGER', true, 11, null);
		$this->addColumn('ID_ALBUM', 'IdAlbum', 'INTEGER', true, 11, null);
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

} // SfNewsAlbumTableMap
