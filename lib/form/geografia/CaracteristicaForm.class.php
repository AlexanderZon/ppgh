<?php

/**
 * Caracteristica form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class CaracteristicaForm extends BaseCaracteristicaForm
{
  public function configure()
  {
//      $tipo =  TipoPeer::getComboTipos();
//      $this->widgetSchema['id_tipo']   = new sfWidgetFormChoice(array('choices' => $tipo),  array('class' => 'validate[required]'));
      $this->widgetSchema['nome_caracteristica']->setAttributes(array('class' => 'validate[required]','size' => '30','maxlength' => '30'));
      
      $this->validatorSchema['nome_caracteristica'] = new sfValidatorString(array('required' => true, 'trim' => true));
      
      $this->widgetSchema->setLabels(array(
        'id_tipo'              => 'Nome do Tipo:',
        'nome_caracteristica'    => 'Nome Característica:',        
      ));  
  }
}
