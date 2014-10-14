<?php

/**
 * Categoria form base class.
 *
 * @method Categoria getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCategoriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_categoria'   => new sfWidgetFormInputHidden(),
      'nome_categoria' => new sfWidgetFormInputText(),
      'permalink'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_categoria'   => new sfValidatorPropelChoice(array('model' => 'Categoria', 'column' => 'id_categoria', 'required' => false)),
      'nome_categoria' => new sfValidatorString(array('max_length' => 20)),
      'permalink'      => new sfValidatorString(array('max_length' => 150, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categoria';
  }


}
