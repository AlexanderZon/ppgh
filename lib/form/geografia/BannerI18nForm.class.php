<?php

/**
 * BannerI18n form.
 *
 * @package    geografia
 * @subpackage form
 * @author     Henry Vallenilla
 */
class BannerI18nForm extends BaseBannerI18nForm
{
  public function configure()
  {
      $cultures = SfLanguagePeer::listTabLanguages();
      foreach ($cultures as $culture)
      {
          $lang = $culture->getLanguage();
          $this->widgetSchema['arquivo_'.$lang] = new sfWidgetFormInputFileEditable(array(
                'file_src' => '',
                'is_image'  => false,            
                'with_delete' => false,
            ));
          $this->validatorSchema['arquivo_'.$lang] = new sfImageFileValidator(array(
                'required'      => false,
                'mime_types'    => array('image/jpeg', 'image/png', 'image/gif', 'image/pjpeg'),
                'max_size'      => sfConfig::get('app_image_size'),
                'max_height'    => sfConfig::get('app_image_max_height'),
                'min_height'    => sfConfig::get('app_image_min_height'),
                'max_width'     => sfConfig::get('app_image_max_width'),
                'min_width'     => sfConfig::get('app_image_min_width'),
                'path'          => false,
            ), array(
                'required'      => "La imagen principal es requerida",
                'max_width'     => "A largura da imagem é muito longo (o máximo é de %min_width%px, tem %width%px ).",
                'min_width'     => "A largura da imagem é muito curta (o mínimo é %min_width%px, tem %width%px ).",
                'max_height'    => "A altura da imagem deve ser ".sfConfig::get('app_image_max_height')."px.",
                'min_height'    => "A altura da imagem deve ser ".sfConfig::get('app_image_max_height')."px."
          )); 
          
      }
      
      unset($this['prefijo_nome_banner'], $this['status']);
  }
  
  
}
