<?php

/**
 * Eventos form base class.
 *
 * @method Eventos getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEventosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_evento'    => new sfWidgetFormInputHidden(),
      'fecha_inicio' => new sfWidgetFormDate(),
      'fecha_fin'    => new sfWidgetFormDate(),
      'imagen'       => new sfWidgetFormInputText(),
      'status'       => new sfWidgetFormInputText(),
      'posicion'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_evento'    => new sfValidatorPropelChoice(array('model' => 'Eventos', 'column' => 'id_evento', 'required' => false)),
      'fecha_inicio' => new sfValidatorDate(),
      'fecha_fin'    => new sfValidatorDate(),
      'imagen'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'status'       => new sfValidatorString(),
      'posicion'     => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('eventos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Eventos';
  }


}
