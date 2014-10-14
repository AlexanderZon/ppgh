<?php

/**
 * SolicitudTipo form base class.
 *
 * @method SolicitudTipo getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSolicitudTipoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_solicitud_tipo' => new sfWidgetFormInputHidden(),
      'status'            => new sfWidgetFormInputText(),
      'tipo_form'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_solicitud_tipo' => new sfValidatorPropelChoice(array('model' => 'SolicitudTipo', 'column' => 'id_solicitud_tipo', 'required' => false)),
      'status'            => new sfValidatorString(),
      'tipo_form'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('solicitud_tipo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudTipo';
  }


}
