<?php

/**
 * LxUser form base class.
 *
 * @method LxUser getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseLxUserForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_user'     => new sfWidgetFormInputHidden(),
      'id_profile'  => new sfWidgetFormInputText(),
      'codigo'      => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'login'       => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormTextarea(),
      'email'       => new sfWidgetFormInputText(),
      'photo'       => new sfWidgetFormInputText(),
      'last_access' => new sfWidgetFormDateTime(),
      'status'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_user'     => new sfValidatorPropelChoice(array('model' => 'LxUser', 'column' => 'id_user', 'required' => false)),
      'id_profile'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'codigo'      => new sfValidatorString(array('max_length' => 20)),
      'name'        => new sfValidatorString(array('max_length' => 100)),
      'login'       => new sfValidatorString(array('max_length' => 20)),
      'password'    => new sfValidatorString(array('required' => false)),
      'email'       => new sfValidatorString(array('max_length' => 70)),
      'photo'       => new sfValidatorString(array('max_length' => 100)),
      'last_access' => new sfValidatorDateTime(array('required' => false)),
      'status'      => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lx_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'LxUser';
  }


}
