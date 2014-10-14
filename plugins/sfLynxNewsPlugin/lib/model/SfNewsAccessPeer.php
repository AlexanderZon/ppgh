<?php


/**
 * Skeleton subclass for performing query and update operations on the 'sf_news_access' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 19/07/2012 01:20:02
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.sfLynxNewsPlugin.lib.model
 */
class SfNewsAccessPeer extends BaseSfNewsAccessPeer {

    public static function getActiveNucleoInNews($id_nucleo, $id_news) {
        $c =  new Criteria();
        $c->add(self::ID_NUCLEO, $id_nucleo, Criteria::EQUAL);
        $c->add(self::ID_NEWS, $id_news, Criteria::EQUAL);
        return self::doCount($c);
    }
    
    public static function getSelectActiveNucleoInNews($id_nucleo, $id_news) {
        $c =  new Criteria();
        $c->add(self::ID_NUCLEO, $id_nucleo, Criteria::EQUAL);
        $c->add(self::ID_NEWS, $id_news, Criteria::EQUAL);
        return self::doSelectOne($c);
    }
    
    public static function getBuscaNoticias($id_nucleo, $palabra) {
        $c =  new Criteria();
        $c->add(self::ID_NUCLEO, $id_nucleo, Criteria::EQUAL);
        $criterio = $c->getNewCriterion(SfNewsPeer::TITLE, '%'.$palabra.'%', Criteria::LIKE);
        $criterio->addOr($c->getNewCriterion(SfNewsPeer::BODY, '%'.$palabra.'%', Criteria::LIKE));
        $c->add($criterio);
        //Join
        $c->addJoin(self::ID_NEWS, SfNewsPeer::ID_NEWS, Criteria::INNER_JOIN);
        $c->add(SfNewsPeer::STATUS, '1');
        return self::doCount($c);
    }
    
    public static function  getNewsByNucleByCategory($id_nucleo, $id_category, $limit = FALSE)
    {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ID_NEWS);
        $c->addSelectColumn(SfNewsPeer::TITLE);
        $c->addSelectColumn(SfNewsPeer::BODY);
        $c->addSelectColumn(SfNewsPeer::SUMMARY);
        $c->addSelectColumn(SfNewsPeer::IMAGE);
        $c->addSelectColumn(SfNewsPeer::PERMALINK);
        //Join
        $c->addJoin(self::ID_NEWS, SfNewsPeer::ID_NEWS, Criteria::INNER_JOIN);
        //Filtros
        $c->add(self::ID_NUCLEO ,$id_nucleo, Criteria::EQUAL);
        $c->add(self::CATEGORIA,$id_category, Criteria::EQUAL);
        $c->add(SfNewsPeer::IMAGE, "" , Criteria::NOT_EQUAL);
        if($limit)
        {
            $c->setLimit($limit);
        }
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        if ($rs->rowCount()==0) {
            return false;
        }
        while($res = $rs->fetch()) {
            $dato['id_news']      = $res['ID_NEWS'];
            $dato['title']    = $res['TITLE'];
            $dato['body']    = $res['BODY'];
            $dato['sumario']    = $res['SUMMARY'];
            $dato['image']    = $res['IMAGE'];
            $dato['permalink']    = $res['PERMALINK'];
            $datos[] = $dato;
        }
        if (!empty($datos)) {
            return $datos;
        }else {
            return false;
        }
    }

    public static function selectNews($showPage, $id_nucleo)
    {
        $c = new Criteria();
        //Join
        $c->addJoin(self::ID_NEWS, SfNewsPeer::ID_NEWS, Criteria::INNER_JOIN);
        //Filtros
        $c->add(self::ID_NUCLEO ,$id_nucleo, Criteria::EQUAL);
        $pager = new sfPropelPager('SfNewsAccess', 100);
        $pager->setCriteria($c);
        $pager->setPage($showPage);
        $pager->init();
        return $pager;
    }
} // SfNewsAccessPeer
