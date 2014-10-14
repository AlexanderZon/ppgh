<?php

/**
 * EventosI18n form base class.
 *
 * @method EventosI18n getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEventosI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'language'    => new sfWidgetFormInputHidden(),
      'titulo'      => new sfWidgetFormInputText(),
      'resumen'     => new sfWidgetFormTextarea(),
      'descripcion' => new sfWidgetFormTextarea(),
      'permalink'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'EventosI18n', 'column' => 'id', 'required' => false)),
      'language'    => new sfValidatorPropelChoice(array('model' => 'EventosI18n', 'column' => 'language', 'required' => false)),
      'titulo'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'resumen'     => new sfValidatorString(),
      'descripcion' => new sfValidatorString(),
      'permalink'   => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('eventos_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EventosI18n';
  }


}
