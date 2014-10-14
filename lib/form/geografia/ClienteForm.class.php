<?php

/**
 * Cliente form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Your name here
 */
class ClienteForm extends BaseClienteForm
{
  public function configure()
  {
      
      $this->widgetSchema['nome_cliente']->setAttributes(array('class' => 'validate[required]','size' => '30','maxlength' => '30'));
      $this->widgetSchema['site']->setAttributes(array('class' => '','size' => '30','maxlength' => '30'));
      $this->widgetSchema['foto'] = new sfWidgetFormInputFileEditable(array(
        'file_src' => sfConfig::get('sf_upload_dir').'/cliente/'.$this->getObject()->getFoto(),
        'is_image'  => true,
        'edit_mode' => !$this->isNew(),
        'template'      => '<div>%file%<br />%input%<br /></div>',
      ));
      
      // Validators
      $this->validatorSchema['nome_cliente'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['site'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['foto'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['foto'] = new sfValidatorFile(array(
        'required'   => false,
        'max_size'   => sfConfig::get('app_image_size'),
        'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
      ));
      $this->validatorSchema['foto'] = new sfImageFileValidator(array(
            'required'      => false,
            'mime_types'    => array('image/jpeg', 'image/png', 'image/gif', 'image/pjpeg'),
            'max_size'      => sfConfig::get('app_image_size'),
            'max_height'    => '110',
            'min_height'    => '110',
            'max_width'     => '137',
            'min_width'     => '137',
            'path'          => false,
        ), array(
            'required'      => "La imagen principal es requerida",
            'max_width'     => "A largura da imagem é muito longo (o máximo é de %min_width%px, tem %width%px ).",
            'min_width'     => "A largura da imagem é muito curta (o mínimo é %min_width%px, tem %width%px ).",
            'max_height'    => "A altura da imagem deve ser 110px.",
            'min_height'    => "A altura da imagem deve ser 110px."
      ));   
      $this->widgetSchema->setLabels(array(
        'nome_cliente'               => 'Nome do Cliente:',
        'status'                    => 'Status:',
        'foto'                      => 'Imagem',
      ));  
  }
  
  protected function doSave($con = null)
  {
      $module = 'cliente';
      $appYml = sfConfig::get('app_upload_images_cliente');
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
