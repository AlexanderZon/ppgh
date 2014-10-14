<?php


/**
 * Skeleton subclass for performing query and update operations on the 'disciplina' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 30/07/2013 11:23:38
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.geografia
 */
class DisciplinaPeer extends BaseDisciplinaPeer {
    
    
    
    public static function getMaterias($id_semestre)
    {
        $c = new Criteria();
        //Eliminamos la columnas de seleccion en caso de que esten definidas
        $c->clearSelectColumns();
        //Se Agregan las Columnas necesarias
        $c->addSelectColumn(self::ID_MATERIA);
        $c->addSelectColumn(MateriaPeer::MATERIA);
        //Filtros        
        $c->addJoin(self::ID_MATERIA, MateriaPeer::ID_MATERIA, Criteria::INNER_JOIN);
        $c->add(self::ID_SEM, $id_semestre, Criteria::EQUAL);
        $c->addGroupByColumn(self::ID_MATERIA);
        //Ejecucion de consulta
        $rs = self::doSelectStmt($c);
        //Se recuperan los registros y se genera arreglo
        while($res = $rs->fetch())
        {
            $dato['id_materia']   = $res['ID_MATERIA'];
            $dato['nome_materia'] = $res['MATERIA'];
            $datos[] = $dato;
        }
        if(!empty($datos))
        {
            return $datos;
        }else{
            return false;
        }
        
    }
    
    public static function getDisciplinas($id_semestre)
    {
        $c = new Criteria();
        $c->add(self::ID_SEM, $id_semestre, Criteria::EQUAL);
        return self::doSelect($c);        
    }

} // DisciplinaPeer