<?php

/**
 * ProductoI18n form base class.
 *
 * @method ProductoI18n getObject() Returns the current form's model object
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseProductoI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'language'           => new sfWidgetFormInputHidden(),
      'nome_producto'      => new sfWidgetFormInputText(),
      'descricao_producto' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'ProductoI18n', 'column' => 'id', 'required' => false)),
      'language'           => new sfValidatorPropelChoice(array('model' => 'ProductoI18n', 'column' => 'language', 'required' => false)),
      'nome_producto'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'descricao_producto' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('producto_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProductoI18n';
  }


}
