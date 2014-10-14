<?php


/**
 * Skeleton subclass for performing query and update operations on the 'producto_caracteristica' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 08/07/2013 06:25:58
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.crismoe
 */
class ProductoCaracteristicaPeer extends BaseProductoCaracteristicaPeer {
    
    public static function checkProductoByCaracteristica($idPro, $idCarac)
    {
        $c = new Criteria();
        $c->add(self::ID_PRODUCTO, $idPro, Criteria::EQUAL);
        $c->add(self::ID_CARACTERISTICA, $idCarac, Criteria::EQUAL);
        return self::doCount($c);
    }
    
    public static function deleitaVinculo($id_producto)
    {
        $con = Propel::getConnection();
	// select from...
	$c1 = new Criteria();
        $c1->add(self::ID_PRODUCTO, $id_producto, Criteria::EQUAL);
	// delete
        BasePeer::doDelete($c1, $con);
    }
    
    public static function getCaracteristicasByProducto($id_producto)
    {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ID_CARACTERISTICA);
        $c->addSelectColumn(CaracteristicaPeer::NOME_CARACTERISTICA);
        //Filtros        
        $c->addJoin(self::ID_CARACTERISTICA, CaracteristicaPeer::ID_CARACTERISTICA, Criteria::INNER_JOIN);
        $c->addAscendingOrderByColumn(CaracteristicaPeer::NOME_CARACTERISTICA);
        $c->add(self::ID_PRODUCTO, $id_producto, Criteria::EQUAL);
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch())
        {
            $dato['id_carac']   = $res['ID_CARACTERISTICA'];
            $dato['nome_carac'] = $res['NOME_CARACTERISTICA'];
            $datos[] = $dato;
        }
        if(!empty($datos))
        {
            return $datos;
        }else{
            return false;
        }
    }
} // ProductoCaracteristicaPeer