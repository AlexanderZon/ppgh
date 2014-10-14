<?php

/**
 * CorpoDocente form.
 *
 * @package    Geografia
 * @subpackage form
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class CorpoDocenteForm extends BaseCorpoDocenteForm
{
  public function configure()
  {
       
      $this->widgetSchema['nome_docente']->setAttributes(array('class' => 'validate[required]','size' => '35','maxlength' => '100'));
      $this->widgetSchema['ramal']->setAttributes(array('class' => 'validate[required]','size' => '35','maxlength' => '100'));
      $this->widgetSchema['email']->setAttributes(array('class' => 'validate[required,custom[email]]','size' => '35','maxlength' => '70'));
      $this->widgetSchema['site']->setAttributes(array('class' => '','size' => '35','maxlength' => '100'));
      $this->widgetSchema['curriculo']->setAttributes(array('class' => '','size' => '35','maxlength' => '100'));
      $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
            'file_src' => sfConfig::get('sf_upload_dir').'/docente/'.$this->getObject()->getPhoto(),
            'is_image'  => true,
            'edit_mode' => false,
        ));
      
      $this->validatorSchema['ramal'] = new sfValidatorString(array('required' => true, 'trim' => true));
      $this->validatorSchema['site'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['curriculo'] = new sfValidatorString(array('required' => false, 'trim' => true));
      $this->validatorSchema['photo'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => sfConfig::get('app_image_size'),
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
           ));
  }
  
  protected function doSave($con = null)
    {
      $module = 'docente';
      $appYml = sfConfig::get('app_upload_images_lxaccount');
      // Si hay un nuevo archivo por subir y ya mi registro tiene un archivo asociado entonces,
      if ($this->getObject()->getPhoto() && $this->getValue('photo'))
      {
          // recorro y elimino
          for($i=1;$i<=$appYml['copies'];$i++)
          {
              // Elimino las fotos de la carpeta
              if(is_file(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getPhoto()))
              {
                unlink(sfConfig::get('sf_upload_dir').'/'.$module.'/'.$appYml['size_'.$i]['pref_'.$i].'_'.$this->getObject()->getPhoto());
              }
          }
      }
      return parent::doSave($con);
   }
}
