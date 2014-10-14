<?php

/**
 * SfNews form base class.
 *
 * @method SfNews getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSfNewsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_news'             => new sfWidgetFormInputHidden(),
      'id_profile'          => new sfWidgetFormInputText(),
      'status'              => new sfWidgetFormInputText(),
      'flag_ultima_noticia' => new sfWidgetFormInputText(),
      'home'                => new sfWidgetFormInputText(),
      'image'               => new sfWidgetFormInputText(),
      'date'                => new sfWidgetFormDate(),
      'category'            => new sfWidgetFormInputText(),
      'position_profile'    => new sfWidgetFormInputText(),
      'ordem_destaque'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_news'             => new sfValidatorPropelChoice(array('model' => 'SfNews', 'column' => 'id_news', 'required' => false)),
      'id_profile'          => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'status'              => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'flag_ultima_noticia' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'home'                => new sfValidatorString(),
      'image'               => new sfValidatorString(array('max_length' => 50)),
      'date'                => new sfValidatorDate(),
      'category'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'position_profile'    => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'ordem_destaque'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('sf_news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfNews';
  }


}
