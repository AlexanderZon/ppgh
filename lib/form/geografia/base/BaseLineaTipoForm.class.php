<?php

/**
 * LineaTipo form base class.
 *
 * @method LineaTipo getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLineaTipoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_linea_tipo' => new sfWidgetFormInputHidden(),
      'id_linea'      => new sfWidgetFormInputText(),
      'id_tipo'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_linea_tipo' => new sfValidatorPropelChoice(array('model' => 'LineaTipo', 'column' => 'id_linea_tipo', 'required' => false)),
      'id_linea'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_tipo'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('linea_tipo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LineaTipo';
  }


}
