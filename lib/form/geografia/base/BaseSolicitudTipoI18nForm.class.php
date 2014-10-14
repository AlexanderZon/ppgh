<?php

/**
 * SolicitudTipoI18n form base class.
 *
 * @method SolicitudTipoI18n getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseSolicitudTipoI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'language'       => new sfWidgetFormInputHidden(),
      'nome_solicitud' => new sfWidgetFormInputText(),
      'descricao'      => new sfWidgetFormTextarea(),
      'permalink'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'SolicitudTipoI18n', 'column' => 'id', 'required' => false)),
      'language'       => new sfValidatorPropelChoice(array('model' => 'SolicitudTipoI18n', 'column' => 'language', 'required' => false)),
      'nome_solicitud' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'descricao'      => new sfValidatorString(),
      'permalink'      => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('solicitud_tipo_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudTipoI18n';
  }


}
