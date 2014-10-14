<?php

/**
 * CaracteristicaI18n form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class CaracteristicaI18nForm extends BaseCaracteristicaI18nForm
{
  public function configure()
  {
      // widgets
      $language = sfContext::getInstance()->getRequest()->getParameter('language');      
      $this->widgetSchema['nome_caracteristica']->setAttributes(array('class' => 'validate[required]','size' => '40','maxlength' => '30'));
      //Etiquetas
      $this->widgetSchema->setLabels(array(
        'nome_caracteristica'   => 'Nome Característica<span class="required">*</span>',
      ));
  }
}
