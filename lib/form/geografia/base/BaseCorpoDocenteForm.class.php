<?php

/**
 * CorpoDocente form base class.
 *
 * @method CorpoDocente getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCorpoDocenteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_docente'   => new sfWidgetFormInputHidden(),
      'nome_docente' => new sfWidgetFormInputText(),
      'ramal'        => new sfWidgetFormInputText(),
      'sala'         => new sfWidgetFormInputText(),
      'email'        => new sfWidgetFormInputText(),
      'site'         => new sfWidgetFormInputText(),
      'curriculo'    => new sfWidgetFormInputText(),
      'photo'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_docente'   => new sfValidatorPropelChoice(array('model' => 'CorpoDocente', 'column' => 'id_docente', 'required' => false)),
      'nome_docente' => new sfValidatorString(array('max_length' => 40)),
      'ramal'        => new sfValidatorString(array('max_length' => 40)),
      'sala'         => new sfValidatorString(array('max_length' => 20)),
      'email'        => new sfValidatorString(array('max_length' => 100)),
      'site'         => new sfValidatorString(array('max_length' => 100)),
      'curriculo'    => new sfValidatorString(array('max_length' => 100)),
      'photo'        => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('corpo_docente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CorpoDocente';
  }


}
