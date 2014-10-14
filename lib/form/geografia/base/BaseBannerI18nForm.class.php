<?php

/**
 * BannerI18n form base class.
 *
 * @method BannerI18n getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseBannerI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_banner'           => new sfWidgetFormInputHidden(),
      'prefijo_nome_banner' => new sfWidgetFormInputText(),
      'status'              => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_banner'           => new sfValidatorPropelChoice(array('model' => 'BannerI18n', 'column' => 'id_banner', 'required' => false)),
      'prefijo_nome_banner' => new sfValidatorString(array('max_length' => 30)),
      'status'              => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('banner_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'BannerI18n';
  }


}
