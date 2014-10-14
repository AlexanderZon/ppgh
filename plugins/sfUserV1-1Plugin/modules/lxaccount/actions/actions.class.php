<?php
/**
 * lxlogin actions.
 *
 * @package    lynx4
 * @subpackage lxaccount
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class lxaccountActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		
        //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Informações da Conta').' - '.sfConfig::get('app_name_app'));

        $this->forward404Unless($LxAccount = LxUserPeer::retrieveByPk($this->getUser()->getAttribute('idUserPanel')), sprintf('Object LxModule does not exist (%s).', $this->getUser()->getAttribute('idUserPanel')));
        $this->form = new AccountForm($LxAccount);
        if ($request->isMethod('post'))
        {
            
            $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
            if ($this->form->isValid())
            {
                
              $LxAccount = $this->form->save();
              //Image process
              if($this->form->getValue('photo'))
              {
                $file = $this->form->getValue('photo');
                
                $Model = LxUserPeer::retrieveByPK($LxAccount->getIdUser());
                // Aqui cargo la imagen con la funcion loadFiles de mi Helper
                sfProjectConfiguration::getActive()->loadHelpers('uploadFile');
                $fileUploaded = loadFiles($file->getOriginalName(), $file->getTempname(), 0, sfConfig::get('sf_upload_dir').'/users/', $Model->getIdUser(), false);
                $Model->setPhoto($fileUploaded);
                $Model->save();
              }
              //Actualiza los datos de la sesion
              $rs = new lynxValida();
              $this->getUser()->setAttribute('nameUser', $LxAccount->getName());
              $this->getUser()->setAttribute('emailUser',$LxAccount->getEmail());
              $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_save_confir')));
              return $this->redirect('lxaccount/index');
            }
        }
	}
	
}