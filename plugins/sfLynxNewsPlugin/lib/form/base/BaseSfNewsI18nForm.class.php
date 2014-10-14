<?php

/**
 * SfNewsI18n form base class.
 *
 * @method SfNewsI18n getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSfNewsI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'language'  => new sfWidgetFormInputHidden(),
      'title'     => new sfWidgetFormInputText(),
      'summary'   => new sfWidgetFormTextarea(),
      'body'      => new sfWidgetFormTextarea(),
      'permalink' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'SfNewsI18n', 'column' => 'id', 'required' => false)),
      'language'  => new sfValidatorPropelChoice(array('model' => 'SfNewsI18n', 'column' => 'language', 'required' => false)),
      'title'     => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'summary'   => new sfValidatorString(),
      'body'      => new sfValidatorString(),
      'permalink' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('sf_news_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfNewsI18n';
  }


}
