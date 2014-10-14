<?php


/**
 * Skeleton subclass for performing query and update operations on the 'producto_i18n' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 16/07/2013 16:46:29
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.crismoe
 */
class ProductoI18nPeer extends BaseProductoI18nPeer {
    
    public static function getNomeProduto($id_producto)
    {
        //Obtengo el idioma principal
        $idioma_principal = SfLanguagePeer::getLanguagePrincipal();
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias        
        $c->addSelectColumn(self::NOME_PRODUCTO);
        $c->addSelectColumn(self::DESCRICAO_PRODUCTO);
        //Filtros
        $c->add(self::ID,$id_producto, Criteria::EQUAL);
        $c->add(self::LANGUAGE,$idioma_principal['language'],Criteria::EQUAL);        
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch())
        {
            $datoSeccion['nome_producto'] = $res['NOME_PRODUCTO'];
            $datoSeccion['desc_producto'] = $res['DESCRICAO_PRODUCTO'];
        }
        if (!empty($datoSeccion)){
            return $datoSeccion;
        }else{
            return false;
        }
    }

} // ProductoI18nPeer
