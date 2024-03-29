<?php


/**
 * Skeleton subclass for performing query and update operations on the 'lx_user_module' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 31/05/2012 20:12:07
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.lynx
 */
class LxUserModulePeer extends BaseLxUserModulePeer {
    
    /**
     * Valida si la permisologia existe
     * @param <integer> $id_privelege
     * @param <integer> $id_user
     * @param <integer> $id_module
     * @return <integer>
     */
    public static function valPrivilege($id_privelege, $id_user, $id_module)
    {
        $c = new Criteria();
        $c->add(self::ID_PRIVILEGE, $id_privelege, Criteria::EQUAL);
        $c->add(self::ID_MODULE, $id_module, Criteria::EQUAL);
        $c->add(self::ID_USER, $id_user, Criteria::EQUAL);
        return self::doCount($c);
    }
    
    public static function valPrivilegeUser($id_privelege, $id_user, $id_module, $typeVision)
    {
        $c = new Criteria();
        $c->add(self::ID_PRIVILEGE, $id_privelege, Criteria::EQUAL);
        $c->add(self::ID_MODULE, $id_module, Criteria::EQUAL);
        $c->add(self::ID_USER, $id_user, Criteria::EQUAL);
        $c->add(self::TYPE_VISION, $typeVision, Criteria::EQUAL);
        return self::doCount($c);
    }
    
    public static function getTypeByModuleUser($id_module, $id_user)
    {
        $c = new Criteria();
        $c->add(self::ID_MODULE, $id_module, Criteria::EQUAL);
        $c->add(self::ID_USER, $id_user, Criteria::EQUAL);
        return self::doSelectOne($c);
    }
    
    public static function valPermissionUser($id_module, $id_user)
    {
        $c = new Criteria();
        $c->add(self::ID_MODULE, $id_module, Criteria::EQUAL);
        $c->add(self::ID_USER, $id_user, Criteria::EQUAL);
        return self::doCount($c);
    }
    
    public static function valPermissionUserNew($id_privilege, $id_user, $id_module)
    {
        $c = new Criteria();
        $c->add(self::ID_PRIVILEGE, $id_privilege, Criteria::EQUAL);
        $c->add(self::ID_MODULE, $id_module, Criteria::EQUAL);
        $c->add(self::ID_USER, $id_user, Criteria::EQUAL);
        return self::doCount($c);
    }
    
    public static function newPermission($id_user, $id_module)
    {
        $new = new LxUserModule();
        $new->setIdUser($id_user);
        $new->setIdModule($id_module);
        $new->save();
    }
    
    public static function updateTypeUserModule($id_user, $id_module, $type)
    {
      $con = Propel::getConnection();
      // select from�
      $c1 = new Criteria();
      $c1->add(self::ID_MODULE, $id_module, Criteria::EQUAL);
      $c1->add(self::ID_USER, $id_user, Criteria::EQUAL);
      // update set
      $c2 = new Criteria();
      $c2->add(self::TYPE_VISION, $type);
      BasePeer::doUpdate($c1, $c2, $con);
    }
    
    /**
     *
     * @param <integer> $id_privelege
     * @param <integer> $id_user
     * @param <integer> $id_module
     */
    public static function registerPermission($id_privelege, $id_user, $id_module, $type = 0)
    {
        $new = new LxUserModule();
        $new->setIdPrivilege($id_privelege);
        $new->setIdUser($id_user);
        $new->setIdModule($id_module);
        $new->setTypeVision($type);
        $new->save();
    }
    
    /**
     * Elimina un permiso
     * @param <integer> $id_privelege
     * @param <integer> $id_user
     * @param <integer> $id_module
     */
    public static function  eliminaPermiso($id_privelege, $id_user, $id_module)
    {
        $con = Propel::getConnection();
	// select from...
	$c1 = new Criteria();
        $c1->add(self::ID_PRIVILEGE, $id_privelege, Criteria::EQUAL);
        $c1->add(self::ID_USER, $id_user, Criteria::EQUAL);
	$c1->add(self::ID_MODULE, $id_module, Criteria::EQUAL);        
	// delete
        BasePeer::doDelete($c1, $con);
    }
    
    /**
     * Elimina un permiso
     * @param <integer> $id_privelege
     * @param <integer> $id_user
     * @param <integer> $id_module
     * @param <integer> $vista
     */
    public static function  eliminaPermisoPorVista($id_privelege, $id_user, $id_module, $vista)
    {
        $con = Propel::getConnection();
	// select from...
	$c1 = new Criteria();
        $c1->add(self::ID_PRIVILEGE, $id_privelege, Criteria::EQUAL);
        $c1->add(self::ID_USER, $id_user, Criteria::EQUAL);
	$c1->add(self::ID_MODULE, $id_module, Criteria::EQUAL);        
	$c1->add(self::TYPE_VISION, $vista, Criteria::EQUAL);        
	// delete
        BasePeer::doDelete($c1, $con);
    }
    
    public static function deletePermission($id_user, $id_module)
    {
        $con = Propel::getConnection();
	// select from...
	$c1 = new Criteria();
        $c1->add(self::ID_USER, $id_user, Criteria::EQUAL);
	$c1->add(self::ID_MODULE, $id_module, Criteria::EQUAL);        
	// delete
        BasePeer::doDelete($c1, $con);
    }
    
    /**
     * Elimina todos los permisos del perfil asociado al modulo
     * @param <integer> $id_profile
     * @param <integer> $id_module
     */
    public static function deleteAllPermissions($id_user, $id_module)
    {
        $con = Propel::getConnection();
	// select from...
	$c1 = new Criteria();
	$c1->add(self::ID_MODULE, $id_module, Criteria::EQUAL);
        $c1->add(self::ID_USER, $id_user, Criteria::EQUAL);
	// delete
        BasePeer::doDelete($c1, $con);
    }
    
    /**
     * Elimina todos los permisos del perfil asociado al modulo de acuerdo al tipo de vista
     * @param <integer> $id_profile
     * @param <integer> $id_module
     * @param <integer> $typeVision
     */
    public static function deleteAllPermissionsByType($id_user, $id_module, $typeVision)
    {
        $con = Propel::getConnection();
	// select from...
	$c1 = new Criteria();
	$c1->add(self::ID_MODULE, $id_module, Criteria::EQUAL);
        $c1->add(self::ID_USER, $id_user, Criteria::EQUAL);
        $c1->add(self::TYPE_VISION, $typeVision, Criteria::EQUAL);
	// delete
        BasePeer::doDelete($c1, $con);
    }
    
    public static function getCredencialUser($id_user) {
            $c =  new Criteria();

            //Eliminamos la columnas de seleccion en caso de que esten definidas
            $c->clearSelectColumns();

            //Selecciona las columnas
            $c->addSelectColumn(LxModulePeer::ID_PARENT);
            $c->addSelectColumn(LxModulePeer::CREDENTIAL);
            $c->addSelectColumn(self::TYPE_VISION);
            $c->addSelectColumn(LxPrivilegePeer::SF_PRIVILEGE);
            
            $c->addJoin(LxModulePeer::ID_MODULE,self::ID_MODULE,Criteria::INNER_JOIN);
            $c->addJoin(self::ID_PRIVILEGE, LxPrivilegePeer::ID_PRIVILEGE, Criteria::INNER_JOIN);
            
            //Condicion
            $c->add(LxModulePeer::STATUS, 1, Criteria::EQUAL);
            $c->add(self::ID_USER, $id_user, Criteria::EQUAL);
            //Ejecucion de consulta
            $rs = self::doSelectStmt($c);
            //Se recuperan los registros y se genera arreglo
            while($res = $rs->fetch())
            {
                    $credencial['id_parent']    = $res['ID_PARENT'];
                    $credencial['credential']   = $res['CREDENTIAL'];
                    $credencial['type_vision']  = $res['TYPE_VISION'];
                    $credencial['sf_privilege'] = $res['SF_PRIVILEGE'];
                    $credentials[] = $credencial;
            }
            
            if (!empty($credentials)){
                    return $credentials;
            }else{
                    return false;
            }
    }

} // LxUserModulePeer
