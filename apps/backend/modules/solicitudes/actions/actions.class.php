<?php

/**
 * solicitudes actions.
 *
 * @package    Geografia
 * @subpackage solicitudes
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class solicitudesActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('List').' solicitudes - Lynx Cms');
	if (!$this->getRequestParameter('buscador')){
                $this->buscador = '';
        }else{
                $this->buscador = $this->getRequestParameter('buscador');
        }
        if(!$this->getRequestParameter('by'))
        {
            $this->by = 'desc';               // Variable para el orden de los registros
            $this->by_page = "asc";           // Variable para el paginador y las flechas de orden
            $sortTemp =  SolicitudPeer::getFieldNames(BasePeer::TYPE_FIELDNAME);
            $this->sort = $sortTemp[0];      // Nombre del campo que por defecto se ordenara
        }
        //Criterios de busqueda
        $c = new Criteria();
        if($this->getRequestParameter('sort'))
        {
            $this->sort = $this->getRequestParameter('sort');
            switch ($this->getRequestParameter('by')) {
                case 'desc':
                    $c->addDescendingOrderByColumn(SolicitudPeer::$this->getRequestParameter('sort'));
                    $this->by = "asc";
                    $this->by_page = "desc";
                    break;
                default:
                    $c->addAscendingOrderByColumn(SolicitudPeer::$this->getRequestParameter('sort'));
                    $this->by = "desc";
                    $this->by_page = "asc";
                    break;
            }
        }else{
            $c->addAscendingOrderByColumn($this->sort);
        }
        if($this->getRequestParameter('tipo_solicitud'))
        {
            $c->add(SolicitudPeer::ID_SOLICITUD_TIPO, $this->getRequestParameter('tipo_solicitud'), Criteria::EQUAL);
        }
        if($this->getRequestParameter('buscador'))
        {
            //Desactiva temporalmente el metodo de escape para que funcionen los link de la paginacion
            sfConfig::set('sf_escaping_strategy', false);
                //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
            $criterio = $c->getNewCriterion(SolicitudPeer::ID_SOLICITUD_TIPO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE);
            $criterio->addOr($c->getNewCriterion(SolicitudPeer::NOME_SOLICITUD, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
            $criterio->addOr($c->getNewCriterion(SolicitudPeer::DESCRICAO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
            $criterio->addOr($c->getNewCriterion(SolicitudPeer::PERMALINK, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
            $criterio->addOr($c->getNewCriterion(SolicitudPeer::STATUS, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
            $criterio->addOr($c->getNewCriterion(SolicitudPeer::TIPO_FORM, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
            $c->add($criterio);
            $buscador = "&buscador=".$this->buscador;
            $this->bus_pagi = "&buscador=".$this->buscador;
        }else{
                $buscador = "";
                $this->bus_pagi = "";
        }			
        $pager = new sfPropelPager('Solicitud',10);
        $pager->setCriteria($c);
        $pager->setPage($this->getRequestParameter('page',1));
        $pager->init();
        $this->Solicituds = $pager;      
        $this->tipos = SolicitudTipoI18nPeer::getLista('pt');
        // Crea sesion de la uri al momento
        $this->getUser()->setAttribute('uri_solicitudes','sort='.$this->sort.'&by='.$this->by_page.$buscador.'&page='.$this->Solicituds->getPage());
  
  }

  public function executeNew(sfWebRequest $request)
  {
    //Desactiva temporalmente el metodo de escape para que funcione el link Back to list
    sfConfig::set('sf_escaping_strategy', false);
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Add new').' solicitudes - Lynx Cms');
    $this->form = new SolicitudGestionForm();
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeCreate(sfWebRequest $request)
  {
    //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' solicitudes - Lynx Cms');
    if (!$request->isMethod('post'))
    {
        $this->redirect("solicitudes/new");
    }
    

    $this->form = new SolicitudGestionForm();
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    //Desactiva temporalmente el metodo de escape para que funcione el link Back to list
    sfConfig::set('sf_escaping_strategy', false);
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' solicitudes - Lynx Cms');   
    $this->forward404Unless($Solicitud = SolicitudPeer::retrieveByPk($request->getParameter('id_solicitud')), sprintf('Object Solicitud does not exist (%s).', $request->getParameter('id_solicitud')));
    $this->form = new SolicitudGestionForm($Solicitud);
    $this->arquivos = SolicitudPeer::getArquivosSolicitud($request->getParameter('id_solicitud'));
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Solicitud = SolicitudPeer::retrieveByPk($request->getParameter('id_solicitud')), sprintf('Object Solicitud does not exist (%s).', $request->getParameter('id_solicitud')));
    $this->form = new SolicitudGestionForm($Solicitud);

    $this->processForm($request, $this->form);
    $this->arquivos = SolicitudPeer::getArquivosSolicitud($request->getParameter('id_solicitud'));
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($Solicitud = SolicitudPeer::retrieveByPk($request->getParameter('id_solicitud')), sprintf('Object Solicitud does not exist (%s).', $request->getParameter('id_solicitud')));
    $Solicitud->delete();

    $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));
    return $this->redirect('solicitudes/index');
  }



public function executeDeleteAll(sfWebRequest $request)
{
    if ($this->getRequestParameter('chk'))
    {
            foreach ($this->getRequestParameter('chk') as $gr => $val)
            {
                    
                    $this->forward404Unless($Solicitud = SolicitudPeer::retrieveByPk($val), sprintf('Object Solicitud does not exist (%s).', $request->getParameter('id_solicitud')));
                    $Solicitud->delete();
            }
            $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));

    }
    return $this->redirect('solicitudes/index');
}

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Solicitud = $form->save();

      $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_save_confir')));
      if($request->getParameter('id_solicitud')){
        return $this->redirect('@default?module=solicitudes&action=index&'.$this->getUser()->getAttribute('uri_solicitudes'));
      }else{
        return $this->redirect('solicitudes/index');
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
      $this->forward404Unless($this->Solicitud = SolicitudPeer::retrieveByPk($request->getParameter('id_solicitud')), sprintf('Object Form does not exist (%s).', $request->getParameter('id_solicitud')));
      if($request->getParameter('status'))
      {
        $this->Solicitud->setStatus(0);
      }else{
        $this->Solicitud->setStatus(1);
      }
      $this->Solicitud->save();
  }
}
