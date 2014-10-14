<?php

/**
 * lxuser actions.
 *
 * @package    lynxcmsv4
 * @subpackage lxuser
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class lxuserActions extends sfActions {
    
    public function executeIndex(sfWebRequest $request) {

        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Lista Usuários').' - '.sfConfig::get('app_name_app'));
        if (!$this->getRequestParameter('buscador')) {
            $this->buscador = '';
        }else {
            $this->buscador = $this->getRequestParameter('buscador');
        }
        if(!$this->getRequestParameter('by')) {
            $this->by = 'desc';               // Variable para el orden de los registros
            $this->by_page = "asc";           // Variable para el paginador y las flechas de orden

            //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
            $this->sort = 'name';      // Nombre del campo que por defecto se ordenara
        }
        // Criterios de busqueda
        $c = new Criteria();
        if($this->getUser()->getAttribute('idProfile') >= 2)
        {
            $c->add(LxUserPeer::ID_PROFILE, 2, Criteria::GREATER_EQUAL);
            $c->add(LxUserPeer::ID_USER, $this->getUser()->getAttribute('idUserPanel') , Criteria::NOT_EQUAL);
        }
        if($this->getRequestParameter('sort')) {
            $this->sort = $this->getRequestParameter('sort');
            switch ($this->getRequestParameter('by')) {

                case 'desc':
                    $c->addDescendingOrderByColumn(LxUserPeer::$this->getRequestParameter('sort'));
                    $this->by = "asc";
                    $this->by_page = "desc";
                    break;
                default:
                    $c->addAscendingOrderByColumn(LxUserPeer::$this->getRequestParameter('sort'));
                    $this->by = "desc";
                    $this->by_page = "asc";
                    break;
            }
        }else {
            $c->addAscendingOrderByColumn($this->sort);
        }
        if($this->getRequestParameter('buscador')) {
            sfConfig::set('sf_escaping_strategy', false);
            //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
            $criterio = $c->getNewCriterion(LxUserPeer::NAME, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE);
            $criterio->addOr($c->getNewCriterion(LxUserPeer::LOGIN, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
            $criterio->addOr($c->getNewCriterion(LxUserPeer::EMAIL, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
            $c->add($criterio);
            $buscador = "&buscador=".$this->buscador;
            $this->bus_pagi = "&buscador=".$this->buscador;
        }else {
            $buscador = "";
            $this->bus_pagi = "";
        }
	
        $pager = new sfPropelPager('LxUser',20);
        $pager->setCriteria($c);
        $pager->setPage($this->getRequestParameter('page',1));
        $pager->setPeerMethod('doSelect');
        $pager->init();
        $this->LxUsers = $pager;

        // Crea sesion de la uri al momento
        $this->getUser()->setAttribute('uri_lxuser','sort='.$this->sort.'&by='.$this->by_page.$buscador.'&page='.$this->LxUsers->getPage());
	
    }

    public function executeNew(sfWebRequest $request) {
        //Desactiva temporalmente el metodo de escape para que funcione el link Back to list
        sfConfig::set('sf_escaping_strategy', false);
        //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Adicionar novo Usuário').' - '.sfConfig::get('app_name_app'));
        $this->form = new LxUserForm();
        $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
        $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
    }

    public function executeCreate(sfWebRequest $request) {
        //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Editar Usuário').' - Lynx Cms');
        if (!$request->isMethod('post')) {
            $this->redirect("lxuser/new");
        }


        $this->form = new LxUserForm();
        //Identifica el modulo padre
        $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
        $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
        $this->processForm($request, $this->form);
        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {       
        //Desactiva temporalmente el metodo de escape para que funcione el link Back to list
        sfConfig::set('sf_escaping_strategy', false);
        //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Editar Usuário').' - '.sfConfig::get('app_name_app'));
        $this->forward404Unless($LxUser = LxUserPeer::retrieveByPk($request->getParameter('id_user')), sprintf('Object LxUser does not exist (%s).', $request->getParameter('id_user')));
        //Evita que se pueda editar el usuario root y administrador del sistema
        $this->forward404If($this->getUser()->getAttribute('idUserPanel')==$LxUser->getIdUser() or $LxUser->getIdUser() == 1);
        $this->form = new LxUserForm($LxUser);
        //$this->form->
        //Identifica el modulo padre
        $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
        $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);



    }

    public function executeUpdate(sfWebRequest $request) {
        
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($LxUser = LxUserPeer::retrieveByPk($request->getParameter('id_user')), sprintf('Object LxUser does not exist (%s).', $request->getParameter('id_user')));
        //Evita que se pueda editar el usuario root y administrador del sistema
        $this->forward404If($this->getUser()->getAttribute('idUserPanel')==$LxUser->getIdUser() or $LxUser->getIdUser() == 1);
        $this->form = new LxUserForm($LxUser);

        $this->processForm($request, $this->form);
        
        //Identifica el modulo padre
        $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
        $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($LxUser = LxUserPeer::retrieveByPk($request->getParameter('id_user')), sprintf('Object LxUser does not exist (%s).', $request->getParameter('id_user')));
        //Evita que se pueda editar el usuario root y administrador del sistema
        $this->forward404If($this->getUser()->getAttribute('idUserPanel')==$LxUser->getIdUser() or $LxUser->getIdUser() <= 2);
        $LxUser->delete();

        $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));
        return $this->redirect('lxuser/index');
    }

    public function executeDeleteAll(sfWebRequest $request) {
        if ($this->getRequestParameter('chk')) {
            foreach ($this->getRequestParameter('chk') as $gr => $val) {
                $this->forward404Unless($LxUser = LxUserPeer::retrieveByPk($val), sprintf('Object LxUser does not exist (%s).', $request->getParameter('id_user')));
                //Evita que se pueda editar el usuario root y administrador del sistema
                $this->forward404If($this->getUser()->getAttribute('idUserPanel')==$LxUser->getIdUser() or $LxUser->getIdUser() <= 2);
                $LxUser->delete();
            }
            $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));

        }
        return $this->redirect('lxuser/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            
            $user = $form->save();
            //Image process
            if($form->getValue('photo'))
            {
              $file = $form->getValue('photo');

              $Model = LxUserPeer::retrieveByPK($user->getIdUser());
              // Aqui cargo la imagen con la funcion loadFiles de mi Helper
              sfProjectConfiguration::getActive()->loadHelpers('uploadFile');
              $fileUploaded = loadFiles($file->getOriginalName(), $file->getTempname(), 0, sfConfig::get('sf_upload_dir').'/users/', $Model->getIdUser(), false);
              $Model->setPhoto($fileUploaded);
              $Model->save();
            }
            $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_save_confir')));
            if($request->getParameter('id_user')) {
                return $this->redirect('@default?module=lxuser&action=index&'.$this->getUser()->getAttribute('uri_lxuser'));
            }else {
                return $this->redirect('lxuser/index');
            }
        }
    }
  /**
   * Cambia el status del usuario
   *
   * @param sfWebRequest $request
   */
  public function executeChangeStatus(sfWebRequest $request)
  {
      $this->forward404Unless($this->LxUser = LxUserPeer::retrieveByPk($request->getParameter('id_user')), sprintf('Object LxUser does not exist (%s).', $request->getParameter('id_user')));
      $this->forward404If($this->getUser()->getAttribute('idUserPanel')==$request->getParameter('id_user') or $this->LxUser->getIdUser() == 1);
      if($request->getParameter('status'))
      {
        $this->LxUser->setStatus(0);
      }else{
        $this->LxUser->setStatus(1);
      }
      $this->LxUser->save();
  }
}
