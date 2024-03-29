<?php


/**
 * Skeleton subclass for performing query and update operations on the 'lojas' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 12/07/2013 15:52:40
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.crismoe
 */
class LojasPeer extends BaseLojasPeer {
    
    public static function getLojasByFiltro($tipo =  "", $id_estado =  "", $id_ciudad =  "")
    {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ID_LOJA);
        $c->addSelectColumn(self::NOME_LOJA);
        $c->addSelectColumn(self::ENDERECO);
        $c->addSelectColumn(self::TELEFONE);
        $c->addSelectColumn(self::CELULAR);
        $c->addSelectColumn(self::EMAIL);
        $c->addSelectColumn(self::SITE);
        //Filtros        
        if($tipo)
        {
            $c->add(self::TIPO_LOJA, $tipo, Criteria::EQUAL);
        }
        if($id_estado)
        {
            $c->add(self::ID_ESTADO, $id_estado, Criteria::EQUAL);
        }
        if($id_ciudad)
        {
            $c->add(self::ID_CIUDAD, $id_ciudad, Criteria::EQUAL);
        }
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch())
        {
            $dato['id_loja']        = $res['ID_LOJA'];
            $dato['nome_loja']      = $res['NOME_LOJA'];
            $dato['endereco']       = $res['ENDERECO'];
            $dato['telefone']       = $res['TELEFONE'];
            $dato['celular']        = $res['CELULAR'];
            $dato['email']          = $res['EMAIL'];
            $dato['site']           = $res['SITE'];
            $datos[] = $dato;
        }
        if(!empty($datos))
        {
            return $datos;
        }else{
            return false;
        }
    }

} // LojasPeer
