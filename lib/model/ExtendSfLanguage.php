<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ExtendSfLanguage extends SfLanguagePeer {

    protected static $principal = array('No', 'Si');

    static public function getPrincipal() {
        return self::$principal;
    }

    public static function principalLanguage() {
      
        $c = new Criteria();
        $c->add(self::PRINCIPAL,1,Criteria::EQUAL);
        $c->add(self::STATUS,1,Criteria::EQUAL);
        return self::doSelectOne($c);
    }


}