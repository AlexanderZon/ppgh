<?php

/**
 * Materia form base class.
 *
 * @method Materia getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMateriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_materia' => new sfWidgetFormInputHidden(),
      'materia'    => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_materia' => new sfValidatorPropelChoice(array('model' => 'Materia', 'column' => 'id_materia', 'required' => false)),
      'materia'    => new sfValidatorString(array('max_length' => 40)),
      'status'     => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('materia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Materia';
  }


}
