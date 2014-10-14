<?php

/**
 * TipoCategoria form base class.
 *
 * @method TipoCategoria getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipoCategoriaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipo_categoria' => new sfWidgetFormInputHidden(),
      'id_tipo'           => new sfWidgetFormInputText(),
      'id_categoria'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_tipo_categoria' => new sfValidatorPropelChoice(array('model' => 'TipoCategoria', 'column' => 'id_tipo_categoria', 'required' => false)),
      'id_tipo'           => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_categoria'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('tipo_categoria[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoCategoria';
  }


}
