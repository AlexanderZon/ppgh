<?php

/**
 * Tipo form base class.
 *
 * @method Tipo getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipo'   => new sfWidgetFormInputHidden(),
      'nome_tipo' => new sfWidgetFormInputText(),
      'foto'      => new sfWidgetFormInputText(),
      'status'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_tipo'   => new sfValidatorPropelChoice(array('model' => 'Tipo', 'column' => 'id_tipo', 'required' => false)),
      'nome_tipo' => new sfValidatorString(array('max_length' => 20)),
      'foto'      => new sfValidatorString(array('max_length' => 20)),
      'status'    => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('tipo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tipo';
  }


}
