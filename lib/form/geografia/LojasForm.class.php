<?php

/**
 * Lojas form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class LojasForm extends BaseLojasForm
{
  public function configure()
  {
    $estados        = array(''); 
    $ciudades       = array(''); 
    $tipo_lojas     = sfConfig::get('mod_loja_tipo_lojas');
    $status = array('1' => 'Ativo','0' => 'Desativo');
    if(!$this->getObject()->isNew()) {
      $items = EstadosPeer::getEstados();
      foreach($items as $item) {
        $estados[$item->getIdEstado()] = $item->getNomeEstado();
      }
      $items = CiudadesPeer::getCiudadesByEstado($this->getObject()->getIdEstado());
      foreach($items as $item) {
        $ciudades[$item->getIdCiudad()] = $item->getNomeCiudad();
      }
    }else {
      //Se definen los valores de los campos si se esta creando un objeto nuevo
      $estados  = array('' => 'Selecione um estado...');
      $items = EstadosPeer::getEstados();
      foreach($items as $item) {
        $estados[$item->getIdEstado()] = $item->getNomeEstado();
      }
      $ciudades = array('' => 'Selecione uma cidade...');
    }
    
    // Widgets
    $this->widgetSchema['id_estado']  = new sfWidgetFormChoice(array('choices' => $estados),  array('id' => 'estados', 'class' => 'validate[required]'));
    $this->widgetSchema['id_ciudad'] = new sfWidgetFormChoice(array('choices' => $ciudades), array('id' => 'ciudades', 'class' => 'validate[required]'));
    $this->widgetSchema['tipo_loja'] = new sfWidgetFormChoice(array('choices' => $tipo_lojas));
    $this->widgetSchema['status'] = new sfWidgetFormChoice(array('choices' => $status));
    $this->widgetSchema['nome_loja']->setAttributes(Array('class' => 'validate[required]', 'maxlength' => '70','size'=>'60'));
    $this->widgetSchema['endereco'] = new sfWidgetFormTextarea(array(),array('cols' => '70', 'rows' => '1', 'maxlength' => '200'));
    $this->widgetSchema['complemento']->setAttributes(Array('class' => '', 'maxlength' => '20','size'=>'20'));
    $this->widgetSchema['numero']->setAttributes(Array('class' => 'validate[required]', 'maxlength' => '20','size'=>'20'));
    $this->widgetSchema['telefone']->setAttributes(Array('class' => '', 'maxlength' => '20','size'=>'20'));
    $this->widgetSchema['celular']->setAttributes(Array('class' => '', 'maxlength' => '20','size'=>'20'));
    $this->widgetSchema['email']->setAttributes(array('class' => 'validate[required,custom[email]]','size' => '35','maxlength' => '70'));
    $this->widgetSchema['site']->setAttributes(Array('class' => '', 'maxlength' => '70','size'=>'60'));
    
    // Validators
    $this->validatorSchema['id_estado'] = new sfValidatorString(array('required' => true, 'trim' => true));
    $this->validatorSchema['id_ciudad'] = new sfValidatorString(array('required' => true, 'trim' => true));
    $this->validatorSchema['tipo_loja'] = new sfValidatorString(array('required' => true, 'trim' => true));
    $this->validatorSchema['nome_loja'] = new sfValidatorString(array('required' => true, 'trim' => true));
    $this->validatorSchema['endereco'] = new sfValidatorString(array('required' => false, 'trim' => true));
    $this->validatorSchema['complemento'] = new sfValidatorString(array('required' => false, 'trim' => true));
    $this->validatorSchema['numero'] = new sfValidatorString(array('required' => false, 'trim' => true));
    $this->validatorSchema['telefone'] = new sfValidatorString(array('required' => false, 'trim' => true));
    $this->validatorSchema['celular'] = new sfValidatorString(array('required' => false, 'trim' => true));
    $this->validatorSchema['email'] = new sfValidatorString(array('required' => false, 'trim' => true));
    $this->validatorSchema['site'] = new sfValidatorString(array('required' => false, 'trim' => true));
    
    // Labels
    $this->widgetSchema->setLabels(array(
        'id_estado'          => 'Estado: <span class="required">*</span>',
        'id_ciudad'         => 'Cidade: <span class="required">*</span>',
        'nombre_loja'         => 'Nome do Loja: <span class="required">*</span>',        
        'tipo_loja'              => 'Tipo Loja:',
        'complemento'               => 'Complemento',
        'numero'                    => 'Número',
        'endereco'              => 'Endereço do Loja:',
    ));
  }
}
