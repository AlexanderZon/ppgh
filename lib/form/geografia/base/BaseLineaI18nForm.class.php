<?php

/**
 * LineaI18n form base class.
 *
 * @method LineaI18n getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLineaI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'language'   => new sfWidgetFormInputHidden(),
      'nome_linea' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'LineaI18n', 'column' => 'id', 'required' => false)),
      'language'   => new sfValidatorPropelChoice(array('model' => 'LineaI18n', 'column' => 'language', 'required' => false)),
      'nome_linea' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('linea_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LineaI18n';
  }


}
