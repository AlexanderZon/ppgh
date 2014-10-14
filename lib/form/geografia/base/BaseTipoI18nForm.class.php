<?php

/**
 * TipoI18n form base class.
 *
 * @method TipoI18n getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipoI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'language'  => new sfWidgetFormInputHidden(),
      'nome_tipo' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'TipoI18n', 'column' => 'id', 'required' => false)),
      'language'  => new sfValidatorPropelChoice(array('model' => 'TipoI18n', 'column' => 'language', 'required' => false)),
      'nome_tipo' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoI18n';
  }


}
