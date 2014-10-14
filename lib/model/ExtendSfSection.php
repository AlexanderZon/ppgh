<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

class ExtendSfSection extends SfSectionPeer {

    public static function principalSection() {
        $c = new Criteria();
        $c->add(self::HOME,1,Criteria::EQUAL);
        return self::doSelectOne($c);
    }

    public static function validateSwitcheMenu($switche, $culture = '') {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ID);
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);

        //Filtros
        $c->add(self::SW_MENU ,$switche, Criteria::EQUAL);
        $c->addJoin(self::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);
        if($culture) {
            $c->add(SfSectionI18nPeer::LANGUAGE, $culture, Criteria::EQUAL);
        }
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        $datoSeccion['totalRsult'] = $rs->rowCount();
        if ($datoSeccion['totalRsult']==0) {
            return false;
        }

        while($res = $rs->fetch()) {
            $datoSeccion['idSection'] = $res['ID'];
            $datoSeccion['nameSection'] = $res['NAME_SECTION'];

        }
        if (!empty($datoSeccion)) {
            return $datoSeccion;
        }else {
            return false;
        }
    }

    public static function getNombreSection($idseccion) {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ID);
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);

        //Filtros
        $c->add(self::ID ,$idseccion, Criteria::EQUAL);
        $c->addJoin(self::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        $datoSeccion['totalRsult'] = $rs->rowCount();
        if ($datoSeccion['totalRsult']==0) {
            return false;
        }

        while($res = $rs->fetch()) {
            $datoSeccion['idSection'] = $res['ID'];
            $datoSeccion['nameSection'] = $res['NAME_SECTION'];

        }
        if (!empty($datoSeccion)) {
            return $datoSeccion;
        }else {
            return false;
        }
    }
    public static function getSwMenuSection($idseccion) {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::SW_MENU);
        //Filtros
        $c->add(self::ID ,$idseccion, Criteria::EQUAL);
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        $datoSeccion['totalRsult'] = $rs->rowCount();
        if ($datoSeccion['totalRsult']==0) {
            return false;
        }

        while($res = $rs->fetch()) {
            $datoSeccion['sw_menu'] = $res['SW_MENU'];
        }
        if (!empty($datoSeccion)) {
            return $datoSeccion;
        }else {
            return false;
        }
    }

    public static function searchInfoSection($section,$principal_language) {

        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(SfSectionPeer::ID_BANNER);
        $c->addSelectColumn(SfSectionPeer::SW_MENU);
        $c->addSelectColumn(SfSectionPeer::SPECIAL_PAGE);
        $c->addSelectColumn(SfSectionPeer::SHOW_TEXT);
        $c->addSelectColumn(SfSectionPeer::ONLY_COMPLEMENT);
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);
        $c->addSelectColumn(SfSectionI18nPeer::DESCRIP_SECTION);
        $c->addSelectColumn(SfSectionI18nPeer::META_DESCRIPTION);
        $c->addSelectColumn(SfSectionI18nPeer::META_KEYWORD);
        $c->addSelectColumn(SfSectionPeer::ID);
        $c->addSelectColumn(SfSectionI18nPeer::META_TITLE);
        $c->addSelectColumn(SfSectionPeer::ID_PARENT);
        //Filtros
        $c->addJoin(SfSectionPeer::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);
        $c->add(SfSectionPeer::SW_MENU,$section,Criteria::EQUAL);
        $c->add(SfSectionI18nPeer::LANGUAGE,$principal_language,Criteria::EQUAL);
        $c1 = $c->getNewCriterion(SfSectionPeer::STATUS,1,Criteria::EQUAL);
        $c2 = $c->getNewCriterion(SfSectionPeer::STATUS,2,Criteria::EQUAL);
        $c1->addOr($c2);
        $c->add($c1);

        return SfSectionI18nPeer::doSelectStmt($c);
    }

    public static function searchParentSection($culture) {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::SW_MENU);
        $c->addSelectColumn(self::ID_PARENT);
        $c->addSelectColumn(self::CONTROL);
        $c->addSelectColumn(self::POSITION);
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);
        $c->addSelectColumn(self::ID);
        $c->addSelectColumn(self::URL_EXTERNA);


        //Filtros
        $c->addJoin(self::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);
        $c->add(self::ID_PARENT,0,Criteria::EQUAL);
        $c->add(self::STATUS,1,Criteria::EQUAL);
        $c->add(SfSectionI18nPeer::LANGUAGE,$culture,Criteria::EQUAL);
        $c->addAscendingOrderByColumn(self::POSITION);


        $rs = SfSectionI18nPeer::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        if ($rs->rowCount()==0) {
            return false;
        }else {
            while ($res=$rs->fetch()) {
                $infoSeccion['sw_menu'] = $res['SW_MENU'];
                $infoSeccion['idParent'] = $res['ID_PARENT'];
                $infoSeccion['nameSection'] = $res['NAME_SECTION'];
                $infoSeccion['id'] = $res['ID'];
                $infoSeccion['control'] = $res['CONTROL'];
                $infoSeccion['position'] = $res['POSITION'];
                $infoSeccion['url_externa'] = $res['URL_EXTERNA'];
                $infoSecciones[] = $infoSeccion;
            }
            if(!empty($infoSecciones)) {
                return $infoSecciones;
            }else {
                return false;
            }
        }
    }
    public static function searchSectionFooter($culture) {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::SW_MENU);
        $c->addSelectColumn(self::ID_PARENT);
        $c->addSelectColumn(self::CONTROL);
        $c->addSelectColumn(self::POSITION);
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);
        $c->addSelectColumn(self::ID);
        //Filtros
        $c->addJoin(self::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);
        $c->add(self::ID_PARENT,0,Criteria::EQUAL);
        $c->add(self::HOME,2,Criteria::EQUAL);
        $c->add(SfSectionI18nPeer::LANGUAGE,'pt',Criteria::EQUAL);
        $c->addAscendingOrderByColumn(self::POSITION);
        $rs = SfSectionI18nPeer::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        if ($rs->rowCount()==0) {
            return false;
        }else {
            while ($res=$rs->fetch()) {
                $infoSeccion['sw_menu'] = $res['SW_MENU'];
                $infoSeccion['idParent'] = $res['ID_PARENT'];
                $infoSeccion['nameSection'] = $res['NAME_SECTION'];
                $infoSeccion['id'] = $res['ID'];
                $infoSeccion['control'] = $res['CONTROL'];
                $infoSeccion['position'] = $res['POSITION'];
                $infoSecciones[] = $infoSeccion;
            }
            if(!empty($infoSecciones)) {
                return $infoSecciones;
            }else {
                return false;
            }
        }
    }
    public static function  searchParentSectionByProfile($culture, $idprofile) {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::SW_MENU);
        $c->addSelectColumn(self::ID_PARENT);
        $c->addSelectColumn(self::CONTROL);
        $c->addSelectColumn(self::POSITION);
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);
        $c->addSelectColumn(self::ID);
        $c->addSelectColumn(self::URL_EXTERNA);


        //Filtros
        $c->addJoin(self::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);
        $c->add(self::ID_PROFILE,$idprofile,Criteria::EQUAL);
        $c->add(self::ID_PARENT,0,Criteria::EQUAL);
        $c->add(self::STATUS,1,Criteria::EQUAL);
        $c->add(SfSectionI18nPeer::LANGUAGE,$culture,Criteria::EQUAL);
        $c->addAscendingOrderByColumn(self::POSITION);


        $rs = SfSectionI18nPeer::doSelectStmt($c);
        
        //Se recuperan los registros y se genera arreglo
        if ($rs->rowCount()==0) {
            return false;
        }else {
            while ($res=$rs->fetch()) {
                $infoSeccion['sw_menu'] = $res['SW_MENU'];
                $infoSeccion['idParent'] = $res['ID_PARENT'];
                $infoSeccion['nameSection'] = $res['NAME_SECTION'];
                $infoSeccion['id'] = $res['ID'];
                $infoSeccion['control'] = $res['CONTROL'];
                $infoSeccion['position'] = $res['POSITION'];
                $infoSeccion['url_externa'] = $res['URL_EXTERNA'];
                $infoSecciones[] = $infoSeccion;
            }
            if(!empty($infoSecciones)) {
                return $infoSecciones;
            }else {
                return false;
            }
        }
    }
    public static function  searchSectionByProfilePrincipal($culture, $idprofile) {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);
        $c->addSelectColumn(SfSectionI18nPeer::DESCRIP_SECTION);
        $c->addSelectColumn(self::ID);


        //Filtros
        $c->addJoin(self::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);
        $c->add(self::ID_PROFILE,$idprofile,Criteria::EQUAL);
        $c->add(self::ID_PARENT,0,Criteria::EQUAL);
        $c->add(self::STATUS,1,Criteria::GREATER_THAN);
        $c->add(SfSectionI18nPeer::LANGUAGE,$culture,Criteria::EQUAL);
        $c->addAscendingOrderByColumn(self::POSITION);
        $c->setLimit(1);

        $rs = SfSectionI18nPeer::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        if ($rs->rowCount()==0) {
            return false;
        }else {
            while ($res=$rs->fetch()) {
                $infoSeccion['nameSection'] = $res['NAME_SECTION'];
                $infoSeccion['description'] = $res['DESCRIP_SECTION'];
                $infoSeccion['id'] = $res['ID'];
                //$infoSecciones[] = $infoSeccion;
            }
            if(!empty($infoSeccion)) {
                return $infoSeccion;
            }else {
                return false;
            }
        }
    }

    public static function searchChildrenSection($id_parent,$culture = "") {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::SW_MENU);
        $c->addSelectColumn(self::ID_PARENT);
        $c->addSelectColumn(self::CONTROL);
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);
        $c->addSelectColumn(self::ID);
        $c->addSelectColumn(self::URL_EXTERNA);
        //Filtros
        $c->addJoin(self::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);
        $c->add(self::ID_PARENT,$id_parent,Criteria::EQUAL);
        /*$c1 = $c->getNewCriterion(self::STATUS,1,Criteria::EQUAL);
        $c2 = $c->getNewCriterion(self::STATUS,2,Criteria::EQUAL);
        $c1->addOr($c2);
        $c->add($c1);*/
        $c->add(self::STATUS,1,Criteria::EQUAL);
        $c->add(SfSectionI18nPeer::LANGUAGE,$culture,Criteria::EQUAL);
        $c->addAscendingOrderByColumn(self::POSITION);


        $rs = SfSectionI18nPeer::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        if ($rs->rowCount()==0) {
            return false;
        }else {
            while ($res=$rs->fetch()) {
                $infoSeccion['sw_menu'] = $res['SW_MENU'];
                $infoSeccion['idParent'] = $res['ID_PARENT'];
                $infoSeccion['nameSection'] = $res['NAME_SECTION'];
                $infoSeccion['id'] = $res['ID'];
                $infoSeccion['control'] = $res ['CONTROL'];
                $infoSeccion['url_externa'] = $res ['URL_EXTERNA'];
                $infoSecciones[] = $infoSeccion;
            }
            if(!empty($infoSecciones)) {
                return $infoSecciones;
            }else {
                return false;
            }
        }
    }
    
    public static function searcSwicheMenu($id_section) {

        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::SW_MENU);
        $c->addSelectColumn(SfSectionI18nPeer::NAME_SECTION);
        $c->addSelectColumn(self::ID);
        $c->addSelectColumn(self::ID_PARENT);
        //Filtros
        $c->add(self::ID,$id_section, Criteria::EQUAL);
        $c->addJoin(self::ID,SfSectionI18nPeer::ID,Criteria::INNER_JOIN);

        $rs = SfSectionI18nPeer::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        if ($rs->rowCount()==0) {
            return false;
        }else {
            while ($res=$rs->fetch()) {
                $infoSeccion['swMenu'] = $res['SW_MENU'];
                $infoSeccion['idParent'] = $res['ID_PARENT'];
                $infoSeccion['nameSection'] = $res['NAME_SECTION'];
                $infoSeccion['id'] = $res['ID'];
              
            }
            if(!empty($infoSeccion)) {
                return $infoSeccion;
            }else {
                return false;
            }
        }

        /*$rs = self::doSelectRS($c);
            //Se recuperan los registros y se genera arreglo
            $datoSeccion['totalRsult'] = $rs->getRecordCount();
            if ($datoSeccion['totalRsult']==0){
                    return false;
            }
            while ($rs->next())
            {
                    $datoSeccion['sw_menu'] = $rs->getString(1);
                    $datoSeccion['nameSection'] = $rs->getString(2);
                    $datoSeccion['id'] = $rs->getString(3);
                    $datoSeccion['idParent'] = $rs->getString(4);
            }
            if (!empty($datoSeccion)){
                    return $datoSeccion;
            }else{
                    return false;
            }*/

    }
}