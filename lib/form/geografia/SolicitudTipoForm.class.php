<?php

/**
 * SolicitudTipo form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class SolicitudTipoForm extends BaseSolicitudTipoForm
{
  public function configure()
  {
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array('choices' => array('1' => 'Ativo', '0' => 'Inativo')), array('class' => 'validate[required]'));
      unset($this['tipo_form']);
  }
}
