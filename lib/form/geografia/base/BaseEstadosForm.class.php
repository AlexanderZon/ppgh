<?php

/**
 * Estados form base class.
 *
 * @method Estados getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEstadosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_estado'   => new sfWidgetFormInputHidden(),
      'cod_estado'  => new sfWidgetFormInputText(),
      'nome_estado' => new sfWidgetFormInputText(),
      'id_pais'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_estado'   => new sfValidatorPropelChoice(array('model' => 'Estados', 'column' => 'id_estado', 'required' => false)),
      'cod_estado'  => new sfValidatorString(array('max_length' => 10)),
      'nome_estado' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'id_pais'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estados[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estados';
  }


}
