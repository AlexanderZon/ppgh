<?php


/**
 * Skeleton subclass for representing a row from the 'semestres' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 30/07/2013 11:23:39
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model.geografia
 */
class Semestres extends BaseSemestres {
    
    public function __toString() {
        return $this->getSemestre();
    }

} // Semestres
