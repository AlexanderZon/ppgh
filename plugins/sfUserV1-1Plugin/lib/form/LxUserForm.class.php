<?php

/**
 * LxUser form.
 *
 * @package    lynx
 * @subpackage form
 * @author     Your name here
 */
class LxUserForm extends BaseLxUserForm {
    public function configure() {
        $request =  sfContext::getInstance()->getRequest();
        //Widgets
        //$this->widgetSchema['status'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['name']->setAttributes(array('class' => 'validate[required]','size' => '35','maxlength' => '30'));
        $this->widgetSchema['login']->setAttributes(array('class' => 'validate[required]','size' => '35','maxlength' => '30'));
        if(!$request->getParameter('id_user')) {
            $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array(),array('class' => 'validate[required]','size' => '35','maxlength' => '12'));
        }else {//Solo para editar no es requerido
            $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array(),array('size' => '35','maxlength' => '12'));
        }
        $this->widgetSchema['photo'] = new sfWidgetFormInputFileEditable(array(
            'file_src' => sfConfig::get('sf_upload_dir').'/users/'.$this->getObject()->getPhoto(),
            'is_image'  => true,
            'edit_mode' => false,
        ));


        $this->widgetSchema['email']->setAttributes(array('class' => 'validate[required,custom[email]]','size' => '35','maxlength' => '70'));
        $this->widgetSchema['status'] = new sfWidgetFormChoice(array('choices' => array('1' => 'Ativo', '0' => 'Inativo')));
        if($request->getParameter('id_user')==2) {
            $this->widgetSchema['id_profile'] = new sfWidgetFormChoice(array('choices' => array('2' => 'Administrator')));
        }else{
           $this->widgetSchema['id_profile'] = new sfWidgetFormPropelChoice(array('model' => 'LxProfile', 'peer_method' => 'getProfileWithoutAdmin')); 
        }


        //Validadores
        if(!$request->getParameter('id_user')) {
            $this->validatorSchema['password'] =
                    new sfValidatorString(
                    array('required' => true, 'max_length' =>12, 'min_length' => 6 ,'trim' => true),
                    array('max_length' => 'The new password must have less than 12 characters', 'min_length' => 'The new password must have more than 6 characters')
            );
        }else {//Solo para editar no es requerido
            $this->validatorSchema['password'] =
                    new sfValidatorString(
                    array('required' => false, 'max_length' =>12, 'min_length' => 6 ,'trim' => true),
                    array('max_length' => 'The new password must have less than 12 characters', 'min_length' => 'The new password must have more than 6 characters')
            );
        }
        $this->validatorSchema['photo'] = new sfValidatorFile(array(
            'required'   => false,
            'max_size'   => sfConfig::get('app_image_size'),
            'mime_types' => array('image/jpeg','image/pjpeg','image/png','image/gif'),
           ));
        $this->validatorSchema['photo']->setMessage('max_size','The max value is %max_size% Kb.');
        $this->validatorSchema['photo']->setMessage('mime_types','Error mime types %mime_type%.');
        $this->validatorSchema['email'] = new sfValidatorAnd(array($this->validatorSchema['email'], new sfValidatorEmail(),));
        $this->validatorSchema['id_profile']  = new sfValidatorPropelChoice(array('model' => 'LxProfile', 'column' => 'id_profile', 'required' => true));
        
        $this->validatorSchema['name'] = new sfValidatorString(array('required' => true, 'trim' => true));
        $this->validatorSchema['login'] = new sfValidatorString(array('required' => true, 'trim' => true));
        

        //Etiquetas
        $this->widgetSchema->setLabels(array(
                'id_profile'    => 'Perfil',
                'name'          => 'Nome',
                'login'         => 'Usuário',
                'password'      => 'Senha',
                'email'         => 'Email',
                'photo'     => 'Foto',
        ));
        //Solo para editar
        if($request->getParameter('id_user')) {
            $this->widgetSchema->setLabels(array(
                    'password'    => 'Password',
            ));
        }
        //Mensajes de ayuda
        $this->widgetSchema->setHelps(array(
                'password'    => 'A nova senha deve ter pelo menos 6 caracteres',
        ));
        //Validadores Post-Envio
        $this->validatorSchema->setPostValidator(
                new sfValidatorAnd(
                array(
                //Valida que el login sea unico
                        new sfValidatorPropelUnique(array('model' => 'LxUser', 'column' => 'login'), array('invalid'=>'Um usuÃ¡rio com o mesmo "%column%" jÃ¡ existe')),
                        //Ecripta el password
                        new sfValidatorCallback(array('callback' => array($this, 'md5Password')))
        )));
        
        unset($this['last_access'],$this['codigo']);
    }
    public function md5Password($validator, $values) {
        $request =  sfContext::getInstance()->getRequest();
        $objLynxValida = new lynxValida();
        
        if($values['login'] !=$objLynxValida->limpiaCadena($values['login'])) {
            $error = new sfValidatorError($validator, 'Este campo tem caracteres especiais');
            throw new sfValidatorErrorSchema($validator, array('login' => $error));
        }
        //Cambiar el valor a md5
        if(!empty($values['password'])) {
            $values['password'] = md5($values['password']);
        }
       //Mantiene la clave actual si el campo esta vacio y se esta editando un usuario
       if($request->getParameter('id_user') and empty($values['password'])) {
           $tmpPass = LxUserPeer::getCurrentPassword($request->getParameter('id_user'));
           $values['password'] = $tmpPass->getPassword();
       }

        return $values;
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
