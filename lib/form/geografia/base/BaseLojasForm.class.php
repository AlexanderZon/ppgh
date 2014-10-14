<?php

/**
 * Lojas form base class.
 *
 * @method Lojas getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLojasForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_loja'     => new sfWidgetFormInputHidden(),
      'id_estado'   => new sfWidgetFormInputText(),
      'id_ciudad'   => new sfWidgetFormInputText(),
      'tipo_loja'   => new sfWidgetFormInputText(),
      'nome_loja'   => new sfWidgetFormInputText(),
      'endereco'    => new sfWidgetFormTextarea(),
      'numero'      => new sfWidgetFormInputText(),
      'complemento' => new sfWidgetFormInputText(),
      'telefone'    => new sfWidgetFormInputText(),
      'celular'     => new sfWidgetFormInputText(),
      'email'       => new sfWidgetFormInputText(),
      'site'        => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_loja'     => new sfValidatorPropelChoice(array('model' => 'Lojas', 'column' => 'id_loja', 'required' => false)),
      'id_estado'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_ciudad'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'tipo_loja'   => new sfValidatorString(array('max_length' => 30)),
      'nome_loja'   => new sfValidatorString(array('max_length' => 100)),
      'endereco'    => new sfValidatorString(),
      'numero'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'complemento' => new sfValidatorString(array('max_length' => 20)),
      'telefone'    => new sfValidatorString(array('max_length' => 30)),
      'celular'     => new sfValidatorString(array('max_length' => 30)),
      'email'       => new sfValidatorString(array('max_length' => 100)),
      'site'        => new sfValidatorString(array('max_length' => 100)),
      'status'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('lojas[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lojas';
  }


}
