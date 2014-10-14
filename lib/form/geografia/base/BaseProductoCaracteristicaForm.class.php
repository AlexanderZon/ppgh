<?php

/**
 * ProductoCaracteristica form base class.
 *
 * @method ProductoCaracteristica getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProductoCaracteristicaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_producto_carac' => new sfWidgetFormInputHidden(),
      'id_producto'       => new sfWidgetFormInputText(),
      'id_caracteristica' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_producto_carac' => new sfValidatorPropelChoice(array('model' => 'ProductoCaracteristica', 'column' => 'id_producto_carac', 'required' => false)),
      'id_producto'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'id_caracteristica' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
    ));

    $this->widgetSchema->setNameFormat('producto_caracteristica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductoCaracteristica';
  }


}
