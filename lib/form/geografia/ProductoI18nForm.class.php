<?php

/**
 * ProductoI18n form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class ProductoI18nForm extends BaseProductoI18nForm
{
  public function configure()
  {
      
      // widgets
      $language = sfContext::getInstance()->getRequest()->getParameter('language');      

      $this->widgetSchema['nome_producto']->setAttributes(array('class' => 'validate[required]','size' => '40','maxlength' => '30'));
      
      $this->widgetSchema['descricao_producto']= new sfWidgetFormRichTextarea(array(), array('cols' => '40','rows' => '4'));

      //Etiquetas
      $this->widgetSchema->setLabels(array(
        'nome_producto'                   => 'Nome Produto<span class="required">*</span>',
        'descricao_producto'     =>         'Descricao Produto',        
      ));
      //unset($this['descricao_producto']);
      
  }
}
