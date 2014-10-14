<?php

/**
 * Producto form base class.
 *
 * @method Producto getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProductoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_producto'   => new sfWidgetFormInputHidden(),
      'id_categoria'  => new sfWidgetFormInputText(),
      'id_tipo'       => new sfWidgetFormInputText(),
      'id_linea'      => new sfWidgetFormInputText(),
      'codigo'        => new sfWidgetFormInputText(),
      'nome_producto' => new sfWidgetFormInputText(),
      'descricao'     => new sfWidgetFormTextarea(),
      'medida'        => new sfWidgetFormInputText(),
      'foto'          => new sfWidgetFormInputText(),
      'foto2'         => new sfWidgetFormInputText(),
      'foto3'         => new sfWidgetFormInputText(),
      'arquivo'       => new sfWidgetFormInputText(),
      'status'        => new sfWidgetFormInputText(),
      'destaque'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_producto'   => new sfValidatorPropelChoice(array('model' => 'Producto', 'column' => 'id_producto', 'required' => false)),
      'id_categoria'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_tipo'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_linea'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'codigo'        => new sfValidatorString(array('max_length' => 10)),
      'nome_producto' => new sfValidatorString(array('max_length' => 20)),
      'descricao'     => new sfValidatorString(),
      'medida'        => new sfValidatorString(array('max_length' => 100)),
      'foto'          => new sfValidatorString(array('max_length' => 30)),
      'foto2'         => new sfValidatorString(array('max_length' => 30)),
      'foto3'         => new sfValidatorString(array('max_length' => 30)),
      'arquivo'       => new sfValidatorString(array('max_length' => 50)),
      'status'        => new sfValidatorString(),
      'destaque'      => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('producto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Producto';
  }


}
