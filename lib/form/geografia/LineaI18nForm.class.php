<?php

/**
 * LineaI18n form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class LineaI18nForm extends BaseLineaI18nForm
{
  public function configure()
  {
      // widgets
      $language = sfContext::getInstance()->getRequest()->getParameter('language');      
      $this->widgetSchema['nome_linea']->setAttributes(array('class' => 'validate[required]','size' => '40','maxlength' => '30'));
      //Etiquetas
      $this->widgetSchema->setLabels(array(
        'nome_linea'                   => 'Nome Linea<span class="required">*</span>',
      ));
  }
}
