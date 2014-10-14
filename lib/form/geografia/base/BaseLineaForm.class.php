<?php

/**
 * Linea form base class.
 *
 * @method Linea getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLineaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_linea'   => new sfWidgetFormInputHidden(),
      'nome_linea' => new sfWidgetFormInputText(),
      'descricao'  => new sfWidgetFormInputText(),
      'foto'       => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_linea'   => new sfValidatorPropelChoice(array('model' => 'Linea', 'column' => 'id_linea', 'required' => false)),
      'nome_linea' => new sfValidatorString(array('max_length' => 20)),
      'descricao'  => new sfValidatorString(array('max_length' => 150)),
      'foto'       => new sfValidatorString(array('max_length' => 20)),
      'status'     => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('linea[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Linea';
  }


}
