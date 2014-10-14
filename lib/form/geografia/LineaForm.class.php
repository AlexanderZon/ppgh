<?php

/**
 * Linea form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class LineaForm extends BaseLineaForm
{
  public function configure()
  {
      
      $this->widgetSchema['nome_linea']->setAttributes(array('class' => 'validate[required]','size' => '30','maxlength' => '30'));
      $this->widgetSchema['status']   = new sfWidgetFormChoice(array('choices' => array('1' => 'Ativo', '0' => 'Desativo')));
      $this->widgetSchema['descricao'] = new sfWidgetFormTextarea(array(),array('cols' => '50', 'rows' => '5', 'maxlength' => '150'));
      
      // Validators
      $this->validatorSchema['nome_linea'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['foto'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['status'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['descricao'] = new sfValidatorString(array('required' => true, 'trim' => true));
      
      $this->widgetSchema->setLabels(array(
        'nome_linea'                 => 'Nome do Linha:',
        'status'                    => 'Status:',
        'descricao'                => 'Descrição:',
      ));
  }
}
