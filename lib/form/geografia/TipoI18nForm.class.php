<?php

/**
 * TipoI18n form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class TipoI18nForm extends BaseTipoI18nForm
{
  public function configure()
  {
      // widgets
      $language = sfContext::getInstance()->getRequest()->getParameter('language');      
      $this->widgetSchema['nome_tipo']->setAttributes(array('class' => 'validate[required]','size' => '40','maxlength' => '30'));
      //Etiquetas
      $this->widgetSchema->setLabels(array(
        'nome_tipo'                   => 'Nome Tipo<span class="required">*</span>',
      ));
  }
}
