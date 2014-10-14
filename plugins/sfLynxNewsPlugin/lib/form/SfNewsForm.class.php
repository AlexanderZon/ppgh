<?php
/**
 * SfNews form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */

class SfNewsForm extends BaseSfNewsForm
{
  public function configure()
  {
    $fieldSize = 69;
    $idProfile = sfContext::getInstance()->getUser()->getAttribute('idProfile');
    // widgets
    $this->widgetSchema['id_profile'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['date'] = new sfWidgetFormInputText();
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'file_src' => sfConfig::get('sf_upload_dir').'/news/'.$this->getObject()->getImage(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'      => '<div>%file%<br />%input%<br /></div>',
    ));
    $types = array('1' => 'Ativo', '0' => 'Desativo');
    $category = array('1' => 'Destaque', '3' => 'Sub-Destaque', '2' => 'Basica');
    
    $this->setDefault('id_profile',$idProfile);
    if($idProfile == 1 || $idProfile ==  2)
    {
        $this->widgetSchema['status'] = new sfWidgetFormSelect(array('choices' => $types));
    }else{
        $this->widgetSchema['status'] = new sfWidgetFormInputHidden(array(), array('value' => 0));
    }
    
    $this->widgetSchema['home']   = new sfWidgetFormSelect(array('choices' => $types));

    $this->widgetSchema['category'] = new sfWidgetFormSelect(array('choices' => $category));
    
    //Validators
    $this->validatorSchema['image'] = new sfValidatorFile(array(
     'required'   => false,
     'max_size'   => sfConfig::get('app_image_size'),
     'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
    ));
    
    $this->validatorSchema['image'] = new sfImageFileValidator(array(
          'required'      => false,
          'mime_types'    => array('image/jpeg', 'image/png', 'image/gif', 'image/pjpeg'),
          'max_size'      => sfConfig::get('app_image_size'),
          'min_height'    => $appYml['size_1']['image_height_1'],
          'min_width'     => $appYml['size_1']['image_width_1'],
          'path'          => false,
      ), array(
          'required'      => "La imagen principal es requerida",
          'min_width'     => "El ancho de la imagen es muy corto (mínimo es %min_width%px, tiene %width%px ).",
          'min_height'    => "La altura mínima de la imagen debe ser ".$appYml['size_1']['image_height_1']."px."
    ));
    $this->validatorSchema['image']->setMessage('mime_types','Error mime types %mime_type%.');

    //Etiquetas
    $this->widgetSchema->setLabels(array(
        'title'         => 'Título <span class="required">*</span>',
        'date'          => 'Data',
        'body'          => 'Corpo <span class="required">*</span>',
        'summary'       => 'Sumário',
        'sticky'        => 'Destacado',
        'image'         => 'Imagem Principal',
        'home_title'    => 'Título da Home',
        'category'      => 'Categoria',
    ));
    $appYml = sfConfig::get('app_upload_images_news');
    
    //Help Messages
    $this->widgetSchema->setHelps(array(
        'image'     => 'A imagem deve ser JPEG, JPG, PNG ou GIF<br />
                        A imagem deve ter um tamanho Maximo de '.(sfConfig::get('app_image_size_text')).'<br />
                        A imagem deve ter um tamanho mínimo de '.$appYml['size_1']['image_width_1'].' x '.$appYml['size_1']['image_height_1'].' pixels',
        

    ));
    
    unset($this['sub_title'], $this['flag_ultima_noticia'], $this['position_profile'], $this['permalink'], $this['ordem_destaque']);
  }

  protected function doSave($con = null)
  {
      $module = 'news';
      $appYml = sfConfig::get('app_upload_images_news');
      // Si hay un nuevo archivo por subir y ya mi registro tiene un archivo asociado entonces,
      if ($this->getObject()->getImage() && $this->getValue('image'))
      {
          // recorro y elimino
          for($i=1;$i<=$appYml['copies'];$i++)
          {
              // Elimino las fotos de la carpeta
              if(is_file(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getImage()))
              {
                unlink(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getImage());
              }
          }
      }
      
      return parent::doSave($con);
  }
}
