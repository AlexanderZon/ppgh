<?php

/**
 * Caracteristica form base class.
 *
 * @method Caracteristica getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCaracteristicaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_caracteristica'   => new sfWidgetFormInputHidden(),
      'nome_caracteristica' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_caracteristica'   => new sfValidatorPropelChoice(array('model' => 'Caracteristica', 'column' => 'id_caracteristica', 'required' => false)),
      'nome_caracteristica' => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('caracteristica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Caracteristica';
  }


}
