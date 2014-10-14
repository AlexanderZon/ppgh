<?php

/**
 * CaracteristicaI18n form base class.
 *
 * @method CaracteristicaI18n getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCaracteristicaI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'language'            => new sfWidgetFormInputHidden(),
      'nome_caracteristica' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'CaracteristicaI18n', 'column' => 'id', 'required' => false)),
      'language'            => new sfValidatorPropelChoice(array('model' => 'CaracteristicaI18n', 'column' => 'language', 'required' => false)),
      'nome_caracteristica' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('caracteristica_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CaracteristicaI18n';
  }


}
