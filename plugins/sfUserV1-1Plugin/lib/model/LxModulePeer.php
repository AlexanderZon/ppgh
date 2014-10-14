<?php


/**
 * Skeleton subclass for performing query and update operations on the 'lx_module' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * Tue Mar  9 09:57:09 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.lynx
 */
class LxModulePeer extends BaseLxModulePeer {
    /**
     * Lista la informacion de un modulo segun su id
     */
    public static function getModuleXId($id_module) {
        $c= new Criteria();
        $c->add(self::ID_MODULE,$id_module,Criteria::EQUAL);
        return self::doSelectOne($c);
    }
    /**
     * Lista los modulos hijos que un usuario puede visualizar segun su perfil
     */
    public static function getModulesChildren($id_parent,$id_profile) {
        $c =  new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Selecciona las columnas

        $c->addSelectColumn(self::ID_MODULE);
        $c->addSelectColumn(self::NAME_MODULE);
        $c->addSelectColumn(self::SF_MODULE);
        $c->addSelectColumn(self::ID_PARENT);
        $c->addSelectColumn(self::POSITION);

        $c->addJoin(LxProfileModulePeer::ID_MODULE,self::ID_MODULE,Criteria::INNER_JOIN);
        $c->addJoin(LxProfileModulePeer::ID_PROFILE,LxProfilePeer::ID_PROFILE,Criteria::INNER_JOIN);
        //Condicion
        $c->add(self::STATUS, 1, Criteria::EQUAL);
        $c->add(self::ID_PARENT,$id_parent,Criteria::EQUAL);
        $c->add(LxProfilePeer::STATUS, 1, Criteria::EQUAL);

        $c->add(LxProfileModulePeer::ID_PROFILE, $id_profile, Criteria::EQUAL);
        $c->addAscendingOrderByColumn(self::NAME_MODULE);
        $c->setDistinct();
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch()) {
            $dato['module_id'] = $res['ID_MODULE'];
            $dato['module_name'] = $res['NAME_MODULE'];
            $dato['module_sf'] = $res['SF_MODULE'];
            $dato['parent_id'] = $res['ID_PARENT'];
            $dato['position']  = $res['POSITION'];
            $datos[] = $dato;
        }
        
        if (!empty($datos)) {
            return $datos;
        }else {
            return false;
        }
    }

    /**
     * Si se envia el id del modulo padre devuelve todos los hijos (como doselect)
     */
    public static function getModulesChildrenXSelect($idModuleParent) {
        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(self::NAME_MODULE);
        $criteria->add(self::ID_PARENT,$idModuleParent,Criteria::EQUAL);
        return self::doSelect($criteria);
    }
    /**
     * Lista todos los modulos padres
     */
    public static function getModulesParents() {
        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(self::NAME_MODULE);
        $criteria->add(self::ID_PARENT,0,Criteria::EQUAL);
        //Ejecucion de consulta
        $rs = self::doSelectStmt($criteria);
        //Se recuperan los registros y se genera arreglo
        $dato[0] = 'Parent';
        while($res = $rs->fetch()) {
            $dato[$res['ID_MODULE']] =$res['NAME_MODULE'];
        }
        return $dato;
    }

    /**
     * Lista todos los modulos padres para el menu ExtJs
     */
    public static function getModulesParentsForMenu() {

        $criteria = new Criteria();
        $criteria->addAscendingOrderByColumn(self::POSITION);
        $criteria->addAscendingOrderByColumn(self::NAME_MODULE);
        
        //Ejecucion de consulta
        $rs = self::doSelectStmt($criteria);
        //Primero se recuperan todos los modulos del Lynx
        while($res = $rs->fetch()) {
            $dato['id_module'] =$res['ID_MODULE'];
            $dato['id_parent'] =$res['ID_PARENT'];
            $dato['name_module'] =$res['NAME_MODULE'];
            $datos[] = $dato;
        }
        if (!empty($datos)) {
            
            return $datos;
        }else {
            return false;
        }
    }
    /**
     * Return the parent id
     * @param <string> $sfModule
     * @return <string>
     */
    public static function getParentIdXSfModule($sfModule) {
        $c =  new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();

        //Selection Fields
        $c->addSelectColumn(self::ID_PARENT);

        //Conditions
        $c->add(self::SF_MODULE,$sfModule,Criteria::EQUAL);

        //Execute query
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch()) {
            $data['parent_id'] = $res['ID_PARENT'];
        }
        if (!empty($data)) {
            return $data;
        }else {
            return false;
        }
    }
    /**
     *
     * @param <type> $parentId
     * @return <string> Name Module
     */
    public static function getParentNameXParentId($parentId) {
        $c =  new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();

        //Selection Fields
        $c->addSelectColumn(self::NAME_MODULE);

        //Conditions
        $c->add(self::ID_MODULE,$parentId,Criteria::EQUAL);

        //Execute query
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch()) {
            $data['parent_name'] = $res['NAME_MODULE'];
        }
        if (!empty($data)) {
            return $data;
        }else {
            return false;
        }
    }

    /**
     * Lista los modulos hijos que un usuario puede visualizar segun su perfil
     */
    public static function getOnlyChildren() {
        
        $c =  new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Selecciona las columnas

        $c->addSelectColumn(self::ID_MODULE);
        $c->addSelectColumn(self::NAME_MODULE);
        $c->addSelectColumn(self::SF_MODULE);
        $c->addSelectColumn(self::CREDENTIAL);
        $c->addSelectColumn(self::ID_PARENT);

        //Condicion
        $c->add(self::STATUS, 1, Criteria::EQUAL);
        $c->add(self::ID_PARENT,0,Criteria::NOT_EQUAL);        
        $c->addAscendingOrderByColumn(self::NAME_MODULE);
        
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch()) {
            
            if(!sfContext::getInstance()->getUser()->hasCredential($res['CREDENTIAL'].'_view')){
                continue;
            }
            $dato['module_id'] = $res['ID_MODULE'];
            $dato['module_name'] = $res['NAME_MODULE'];
            $dato['module_sf'] = $res['SF_MODULE'];
            $dato['credential'] = $res['CREDENTIAL'];
            
            $dato['parent_id'] = $res['ID_PARENT'];
            $datos[] = $dato;
        }
        if (!empty($datos)) {
            return $datos;
        }else {
            return false;
        }
    }

    public static function displayModules($id_padre)
    {
      //Obtengo el idioma principal
      //$idioma_principal = SfLanguagePeer::getLanguagePrincipal();
      $c = new Criteria();
      //Eliminamos la columnas de seleccion en caso de que esten definidas
      $c->clearSelectColumns();
      //Se Agregan las Columnas necesarias
      $c->addSelectColumn(self::ID_MODULE);
      $c->addSelectColumn(self::NAME_MODULE);
      $c->addSelectColumn(self::POSITION);
      $c->addSelectColumn(self::STATUS);
      //Join
      //$c->addJoin(LxModule::ID_M, SfSectionPeer::ID, Criteria::INNER_JOIN);
      //Filtros
      $c->add(self::ID_PARENT, $id_padre, Criteria::EQUAL);
      //$c->add(self::LANGUAGE,$idioma_principal['language'],Criteria::EQUAL);
      $c->addAscendingOrderByColumn(self::POSITION);
      $rs = self::doSelectStmt($c);
      //Se recuperan los registros y se genera arreglo
      while($res = $rs->fetch())
      {
        $datoSeccion['id_module'] = $res['ID_MODULE'];
        $datoSeccion['name_module'] = $res['NAME_MODULE'];
        $datoSeccion['position'] = $res['POSITION'];
        $datoSeccion['status'] = $res['STATUS'];
        $datos[] = $datoSeccion;
       }
       if (!empty($datos)){
         return $datos;
       }else{
         return false;
       }
    }

    public static function countSections($idSection)
    {
      $c = new Criteria();
      $c->add(self::ID_PARENT, $idSection, Criteria::EQUAL);
      $c->addAscendingOrderByColumn(self::POSITION);
      return self::doCount($c);
    }

    public static function positionSection($id_section)
    {
      $c = new Criteria();
      //Eliminamos la columnas de seleccion en caso de que esten definidas
      $c->clearSelectColumns();
      //Se Agregan las Columnas necesarias
      $c->addSelectColumn(self::POSITION);
      //Filtros
      $c->add(self::ID_MODULE, $id_section, Criteria::EQUAL);
      $rs = self::doSelectStmt($c);
      //Se recuperan los registros y se genera arreglo
      while($res = $rs->fetch())
      {
        $datoSeccion['posicion'] = $res['POSITION'];
      }
      if (!empty($datoSeccion))
      {
        return $datoSeccion;
      }else{
        return false;
      }
    }

    public static function updatePosition($newPosition, $paren_id, $beforePosition)
    {
      $con = Propel::getConnection();
      // select from�
      $c1 = new Criteria();
      $c1->add(self::ID_PARENT, $paren_id);
      $c1->add(self::POSITION, $beforePosition);
      // update set
      $c2 = new Criteria();
      $c2->add(self::POSITION, $newPosition);
      BasePeer::doUpdate($c1, $c2, $con);
    }

    public static function updatePrincipalPosition($position, $id_section)
    {
      $con = Propel::getConnection();
      // select from�
      $c1 = new Criteria();
      $c1->add(self::ID_MODULE, $id_section);
      // update set
      $c2 = new Criteria();
      $c2->add(self::POSITION, $position);
      BasePeer::doUpdate($c1, $c2, $con);
    }

    public static function updatePaternSection($paternNew,$id_section)
    {
      $con = Propel::getConnection();
      // select from�
      $c1 = new Criteria();
      $c1->add(self::ID_MODULE, $id_section);
      // update set
      $c2 = new Criteria();
      $c2->add(self::ID_PARENT, $paternNew);
      $c2->add(self::POSITION, 1);
      BasePeer::doUpdate($c1, $c2, $con);
    }

    public static function updatePaternSectionPosition($newPatern,$position,$id_section)
    {
      $con = Propel::getConnection();
      // select from�
      $c1 = new Criteria();
      $c1->add(self::ID_MODULE, $id_section);
      // update set
      $c2 = new Criteria();
      $c2->add(self::ID_PARENT, $newPatern);
      $c2->add(self::POSITION, $position);
      BasePeer::doUpdate($c1, $c2, $con);
    }

    public static function sectionsNext($parentId,$actualPosition)
    {
      $c = new Criteria();
      //Eliminamos la columnas de seleccion en caso de que esten definidas
      $c->clearSelectColumns();
      //Se Agregan las Columnas necesarias
      $c->addSelectColumn(self::ID_MODULE);
      $c->addSelectColumn(self::POSITION);
      //Filtros
      $c->add(self::ID_PARENT, $parentId, Criteria::EQUAL);
      $c->add(self::POSITION, $actualPosition, Criteria::GREATER_THAN);
      $c->addAscendingOrderByColumn(self::POSITION);
      $rs = self::doSelectStmt($c);
      //Se recuperan los registros y se genera arreglo
      while($res = $rs->fetch())
      {
        $datoSeccion['id_module'] = $res['ID_MODULE'];
        $datoSeccion['posicion'] = $res['POSITION'];
        $datos[] = 	$datoSeccion;
      }
      if (!empty($datos)){
        return $datos;
      }else{
        return false;
      }
    }

    public static function checkExistPaterns($idPatern)
    {
      $c = new Criteria();
      //Eliminamos la columnas de seleccion en caso de que esten definidas
      $c->clearSelectColumns();
      //Se Agregan las Columnas necesarias
      $c->addSelectColumn(self::ID_MODULE);
      $c->addSelectColumn(self::ID_PARENT);
      $c->addSelectColumn(self::POSITION);
      //Filtros
      $c->add(self::ID_PARENT,$idPatern, Criteria::EQUAL);
      $c->addAscendingOrderByColumn(self::POSITION);
      $rs = self::doSelectStmt($c);
      //Se recuperan los registros y se genera arreglo
      while($res = $rs->fetch())
      {
        $datoSeccion['id_module'] = $res['ID_MODULE'];
        $datoSeccion['id_padre'] = $res['ID_PARENT'];
        $datoSeccion['posicion'] = $res['POSITION'];
        $datos[] = $datoSeccion;
      }
      if (!empty($datos)){
        return $datos;
      }else{
        return false;
      }
    }

    public static function lastModulePositionForParent($parent) {
        
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::POSITION);
        $c->add(self::ID_PARENT,$parent,Criteria::EQUAL);
        $c->setLimit('1');
        return self::doSelectOne($c);
    }

/**
     * Lista los modulos que un usuario puede visualizar segun su perfil
     */
    public static function getUserModule($id_profile) {
        $c =  new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Selecciona las columnas

        $c->addSelectColumn(self::ID_MODULE);
        $c->addSelectColumn(self::NAME_MODULE);
        $c->addSelectColumn(self::SF_MODULE);
        $c->addSelectColumn(self::ID_PARENT);

        $c->addJoin(LxProfileModulePeer::ID_MODULE,self::ID_MODULE,Criteria::INNER_JOIN);
        $c->addJoin(LxProfileModulePeer::ID_PROFILE,LxProfilePeer::ID_PROFILE,Criteria::INNER_JOIN);
        //Condicion
        $c->add(self::STATUS, 1, Criteria::EQUAL);
        
        $c->add(LxProfilePeer::STATUS, 1, Criteria::EQUAL);
        $c->add(LxProfileModulePeer::ID_PROFILE, $id_profile, Criteria::EQUAL);
        $c->addAscendingOrderByColumn(self::ID_PARENT);
        $c->addAscendingOrderByColumn(self::ID_MODULE);
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch()) {
            $dato['module_id'] = $res['ID_MODULE'];
            $dato['module_name'] = $res['NAME_MODULE'];
            $dato['module_sf'] = $res['SF_MODULE'];
            $dato['parent_id'] = $res['ID_PARENT'];
            $datos[] = $dato;
        }
        if (!empty($datos)) {
            return $datos;
        }else {
            return false;
        }
    }
	/**
     * Lista los modulos padres
     */
    public static function getParents($id_profile) {
        $c =  new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Selecciona las columnas

        $c->addSelectColumn(self::ID_MODULE);
        $c->addSelectColumn(self::NAME_MODULE);
        $c->addSelectColumn(self::SF_MODULE);
        $c->addSelectColumn(self::ID_PARENT);

        //Condicion
        $c->add(self::STATUS, 1, Criteria::EQUAL);
        $c->add(self::ID_PARENT, 0, Criteria::EQUAL);
        
        
        //$c->addAscendingOrderByColumn(self::ID_PARENT);
        $c->addAscendingOrderByColumn(self::POSITION);
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch()) {
            $dato['module_id'] = $res['ID_MODULE'];
            $dato['module_name'] = $res['NAME_MODULE'];
            $dato['module_sf'] = $res['SF_MODULE'];
            $dato['parent_id'] = $res['ID_PARENT'];
            $datos[] = $dato;
        }
        if (!empty($datos)) {
            return $datos;
        }else {
            return false;
        }
    }

    /**
     * Lista los modulos hijos que un usuario puede visualizar segun su perfil
     */
    public static function getOnlyChildrenPermissions($idPadre) {

        $c =  new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Selecciona las columnas

        $c->addSelectColumn(self::ID_MODULE);
        $c->addSelectColumn(self::NAME_MODULE);
        $c->addSelectColumn(self::SF_MODULE);
        $c->addSelectColumn(self::CREDENTIAL);
        $c->addSelectColumn(self::ID_PARENT);

        //Condicion
        $c->add(self::STATUS, 1, Criteria::EQUAL);
        if($idPadre){
            $c->add(self::ID_PARENT,$idPadre,Criteria::EQUAL);
        }else{
            $c->add(self::ID_PARENT,0,Criteria::NOT_EQUAL);
        }
        $c->addAscendingOrderByColumn(self::POSITION);
        
        
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch()) {

            if(!sfContext::getInstance()->getUser()->hasCredential($res['CREDENTIAL'].'_view')){
                //continue;
            }
            $dato['module_id'] = $res['ID_MODULE'];
            $dato['module_name'] = $res['NAME_MODULE'];
            $dato['module_sf'] = $res['SF_MODULE'];
            $dato['credential'] = $res['CREDENTIAL'];

            $dato['parent_id'] = $res['ID_PARENT'];
            $datos[] = $dato;
        }
        if (!empty($datos)) {
            return $datos;
        }else {
            return false;
        }
    }

    public static function validaHijosModulo($idModule)
    {
        $c = new Criteria();
        $c->add(self::ID_PARENT,$idModule, Criteria::EQUAL);
        return self::doCount($c);
    }

    /**
     * Busca las secciones padres
     *
     * @global <integer> $sections Al momento de generar la funcion recursiva se deben almacenar todos los valores en un mismo array
     * @param <string> $culture
     * @param <inetegr> $id_section
     * @return <array>
     */
    public static function findModulesPaterns($id_module="")
    {
        global $sections;
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ID_MODULE);
        $c->addSelectColumn(self::NAME_MODULE);
        //Filtros        
        $c->add(self::ID_PARENT,0,Criteria::EQUAL);
        if($id_section)
        {
            $c->add(self::ID_MODULE, $id_module, Criteria::NOT_EQUAL);
        }else{
            $cton1 = $c->getNewCriterion(self::STATUS, 1, Criteria::EQUAL);
            $cton2 = $c->getNewCriterion(self::STATUS, 2, Criteria::EQUAL);
            // combine them
            $cton1->addOr($cton2);
            // add to Criteria
            $c->add($cton1);
        }        
        $c->addAscendingOrderByColumn(self::POSITION);
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        $sections[0] = 'None';
        while($res = $rs->fetch())
        {
            $sections[$res['ID_MODULE']] = "&bull;&nbsp;".$res['NAME_MODULE'];
            self::findModulesChildren($res['ID_MODULE'],"&nbsp;",$id_module);
        }
        if(!empty($sections)){
            return $sections;
        }else{
            return false;
        }
    }

    /**
     * Funcion que busca secciones hijas
     *
     * @global <integer> $sections Al momento de generar la funcion recursiva se deben almacenar todos los valores en un mismo array
     * @param <integer> $id_padre
     * @param <string> $culture
     * @param <string> $tab        Es el separado jerarquico de los nodos
     * @param <integer> $seccion_edit Es la actual seccion que se esta editando. Se usa para excluir del array la seccion seleccionada
     * @return <array>
     */
    public static function findModulesChildren($id_padre=0,$tab="",$seccion_edit)
    {
        global $sections;
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ID_MODULE);
        $c->addSelectColumn(self::NAME_MODULE);        
        $c->add(self::ID_PARENT,$id_padre,Criteria::EQUAL);
        $c->add(self::ID_MODULE,$seccion_edit,Criteria::NOT_EQUAL);
        $c->addAscendingOrderByColumn(self::POSITION);
        $rs = SfSectionI18nPeer::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        $tab.="&nbsp;&nbsp;&nbsp;&nbsp;";
        if ($rs->rowCount()>0){
            while($res = $rs->fetch())
            {
                $sections[$res['ID_MODULE']] = $tab."-&nbsp;".$res['NAME_MODULE'];
                self::findModulesChildren($res['ID_MODULE'],$tab,$seccion_edit);
            }
            return $sections;
        }
    }

} // LxModulePeer