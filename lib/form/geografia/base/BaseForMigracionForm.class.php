<?php

/**
 * ForMigracion form base class.
 *
 * @method ForMigracion getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseForMigracionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'codigo'         => new sfWidgetFormInputText(),
      'tipo'           => new sfWidgetFormInputText(),
      'linea'          => new sfWidgetFormInputText(),
      'caracteristica' => new sfWidgetFormInputText(),
      'descricao'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'ForMigracion', 'column' => 'id', 'required' => false)),
      'codigo'         => new sfValidatorString(array('max_length' => 16, 'required' => false)),
      'tipo'           => new sfValidatorString(array('max_length' => 22, 'required' => false)),
      'linea'          => new sfValidatorString(array('max_length' => 14, 'required' => false)),
      'caracteristica' => new sfValidatorString(array('max_length' => 23, 'required' => false)),
      'descricao'      => new sfValidatorString(array('max_length' => 65, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('for_migracion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ForMigracion';
  }


}
