<?php

/**
 * Cliente form base class.
 *
 * @method Cliente getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseClienteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_cliente'   => new sfWidgetFormInputHidden(),
      'nome_cliente' => new sfWidgetFormInputText(),
      'foto'         => new sfWidgetFormInputText(),
      'site'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_cliente'   => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'id_cliente', 'required' => false)),
      'nome_cliente' => new sfValidatorString(array('max_length' => 100)),
      'foto'         => new sfValidatorString(array('max_length' => 50)),
      'site'         => new sfValidatorString(array('max_length' => 200)),
    ));

    $this->widgetSchema->setNameFormat('cliente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }


}
