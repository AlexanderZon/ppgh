<?php

/**
 * Tipo form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class TipoForm extends BaseTipoForm
{
  public function configure()
  {
      //$categorias   = CategoriaPeer::getComboCategorias();
      //$this->widgetSchema['id_categoria']   = new sfWidgetFormChoice(array('choices' => $categorias),  array('class' => 'validate[required]'));
      //$this->widgetSchema['nome_tipo']->setAttributes(array('class' => 'validate[required]','size' => '30','maxlength' => '30'));
      $this->widgetSchema['status']   = new sfWidgetFormChoice(array('choices' => array('1' => 'Ativo', '0' => 'Desativo')));
      $this->widgetSchema['foto'] = new sfWidgetFormInputFileEditable(array(
        'file_src' => sfConfig::get('sf_upload_dir').'/tipos/'.$this->getObject()->getFoto(),
        'is_image'  => true,
        'edit_mode' => !$this->isNew(),
        'template'      => '<div>%file%<br />%input%<br /></div>',
      ));
      // Validators
      //$this->validatorSchema['nome_tipo'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['foto'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['status'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['foto'] = new sfValidatorFile(array(
        'required'   => false,
        'max_size'   => sfConfig::get('app_image_size'),
        'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
      ));
      $this->validatorSchema['foto'] = new sfImageFileValidator(array(
            'required'      => false,
            'mime_types'    => array('image/jpeg', 'image/png', 'image/gif', 'image/pjpeg'),
            'max_size'      => sfConfig::get('app_image_size'),
            'max_height'    => '131',
            'min_height'    => '131',
            'max_width'     => '131',
            'min_width'     => '131',
            'path'          => false,
        ), array(
            'required'      => "La imagen principal es requerida",
            'max_width'     => "A largura da imagem é muito longo (o máximo é de %min_width%px, tem %width%px ).",
            'min_width'     => "A largura da imagem é muito curta (o mínimo é %min_width%px, tem %width%px ).",
            'max_height'    => "A altura da imagem deve ser 131px.",
            'min_height'    => "A altura da imagem deve ser 131px."
      ));        
      $this->widgetSchema->setLabels(array(
        'status'                    => 'Status:',
        'foto'                      => 'Imagem',
      ));  
      
      //Mensajes de ayuda
      $this->widgetSchema->setHelps(array(
          'foto'     => 'A imagem deve ser JPEG, JPG, PNG ou GIF<br />As dimensões da imagem devem ser 131px x 131px',
      ));
      unset($this['nome_tipo']);
  }
  
  
  protected function doSave($con = null)
  {
      $module = 'tipos';
      $appYml = sfConfig::get('app_upload_images_tipo');
      // Si hay un nuevo archivo por subir y ya mi registro tiene un archivo asociado entonces,
      if ($this->getObject()->getFoto() && $this->getValue('foto'))
      {
          // recorro y elimino
          for($i=1;$i<=$appYml['copies'];$i++)
          {
              // Elimino las fotos de la carpeta
              if(is_file(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getFoto()))
              {
                unlink(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getFoto());
              }
          }
      }      
      return parent::doSave($con);
  }
}
