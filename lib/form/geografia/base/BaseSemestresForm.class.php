<?php

/**
 * Semestres form base class.
 *
 * @method Semestres getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSemestresForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sem'   => new sfWidgetFormInputHidden(),
      'semestre' => new sfWidgetFormInputText(),
      'ano'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_sem'   => new sfValidatorPropelChoice(array('model' => 'Semestres', 'column' => 'id_sem', 'required' => false)),
      'semestre' => new sfValidatorString(array('max_length' => 30)),
      'ano'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('semestres[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Semestres';
  }


}
