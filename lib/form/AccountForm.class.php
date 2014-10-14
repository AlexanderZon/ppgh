<?php

class AccountForm extends BaseLxUserForm {
    public function configure() {

        // widgets
        $this->widgetSchema['name']->setAttributes(array('class' => 'validate[required]','size' => '30','maxlength' => '30'));
        $this->widgetSchema['login']->setAttributes(array('readonly' => 'readonly','size' => '30'));
        $this->widgetSchema['email']->setAttributes(array('class' => 'validate[required,custom[email]]','size' => '30','maxlength' => '70'));
        $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
            'file_src' => sfConfig::get('sf_upload_dir').'/users/'.$this->getObject()->getPhoto(),
            'is_image'  => true,
            'edit_mode' => false,
        ));

        //Validores
        $this->validatorSchema['name']->setOption('required', true);
        $this->validatorSchema['email']->setOption('required', true);
        $this->validatorSchema['email'] = new sfValidatorAnd(array($this->validatorSchema['email'], new sfValidatorEmail(),));
        $this->validatorSchema['photo'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => sfConfig::get('app_image_size'),
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
           ));
        $this->validatorSchema['photo']->setMessage('max_size','The max value is %max_size% Kb.');
        $this->validatorSchema['photo']->setMessage('mime_types','Error mime types %mime_type%.');
        //Labels
        $this->widgetSchema->setLabels(array(
            'login'     => 'Usuário',
            'name'      => 'Nome',
            'email'     => 'Email',                
            'photo'     => 'Foto',                
        ));
        //Excluidos
        unset($this['id_user'], $this['id_profile'], $this['password'], $this['last_access'], $this['status'], $this['codigo'] );
    }
    
    protected function doSave($con = null)
    {
      $module = 'users';
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
?>
