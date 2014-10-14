<?php

/**
 * Ciudades form base class.
 *
 * @method Ciudades getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCiudadesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_ciudad'   => new sfWidgetFormInputHidden(),
      'nome_ciudad' => new sfWidgetFormInputText(),
      'id_estado'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_ciudad'   => new sfValidatorPropelChoice(array('model' => 'Ciudades', 'column' => 'id_ciudad', 'required' => false)),
      'nome_ciudad' => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'id_estado'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ciudades[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ciudades';
  }


}
