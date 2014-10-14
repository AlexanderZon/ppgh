<?php

/**
 * Categoria form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class CategoriaForm extends BaseCategoriaForm
{
  public function configure()
  {
      $this->widgetSchema['nome_categoria']->setAttributes(array('class' => 'validate[required]','size' => '40','maxlength' => '30'));
  }
}
