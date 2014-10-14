<?php

/**
 * tiposolicitud actions.
 *
 * @package    Geografia
 * @subpackage tiposolicitud
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class tiposolicitudActions extends sfActions
{
  public function preExecute() {
        $languagePrincipal = SfLanguagePeer::getLanguagePrincipal();
        $this->language = $languagePrincipal['language'];
  }
  
  public function executeIndex(sfWebRequest $request)
  {
  $this->getResponse()->setTitle($this->getContext()->getI18N()->__('List').' tiposolicitud - Lynx Cms');
	if (!$this->getRequestParameter('buscador')){
			$this->buscador = '';
		}else{
			$this->buscador = $this->getRequestParameter('buscador');
		}
		if(!$this->getRequestParameter('by'))
		{
			$this->by = 'desc';               // Variable para el orden de los registros
			$this->by_page = "asc";           // Variable para el paginador y las flechas de orden
			$sortTemp =  SolicitudTipoPeer::getFieldNames(BasePeer::TYPE_FIELDNAME);
      		//PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
            $this->sort = $sortTemp[0];      // Nombre del campo que por defecto se ordenara
		}
		//Criterios de busqueda
		$c = new Criteria();
		if($this->getRequestParameter('sort'))
		{
			$this->sort = $this->getRequestParameter('sort');
			switch ($this->getRequestParameter('by')) {

				case 'desc':
					$c->addDescendingOrderByColumn(SolicitudTipoPeer::$this->getRequestParameter('sort'));
					$this->by = "asc";
					$this->by_page = "desc";
					break;
				default:
					$c->addAscendingOrderByColumn(SolicitudTipoPeer::$this->getRequestParameter('sort'));
					$this->by = "desc";
					$this->by_page = "asc";
					break;
			}
		}else{
			$c->addAscendingOrderByColumn($this->sort);
		}
		if($this->getRequestParameter('buscador'))
		{
                //Desactiva temporalmente el metodo de escape para que funcionen los link de la paginacion
                sfConfig::set('sf_escaping_strategy', false);
                //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
                		                                    $criterio = $c->getNewCriterion(SolicitudTipoPeer::ID_SOLICITUD_TIPO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE);
                                		                                    $criterio->addOr($c->getNewCriterion(SolicitudTipoPeer::NOME_SOLICITUD, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(SolicitudTipoPeer::DESCRICAO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(SolicitudTipoPeer::PERMALINK, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(SolicitudTipoPeer::STATUS, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(SolicitudTipoPeer::TIPO_FORM, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                					$c->add($criterio);
			$buscador = "&buscador=".$this->buscador;
			$this->bus_pagi = "&buscador=".$this->buscador;
		}else{
			$buscador = "";
			$this->bus_pagi = "";
		}
			
		$pager = new sfPropelPager('SolicitudTipo',100);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page',1));
		$pager->init();
		$this->SolicitudTipos = $pager;                
        // Crea sesion de la uri al momento
        $this->getUser()->setAttribute('uri_tiposolicitud','sort='.$this->sort.'&by='.$this->by_page.$buscador.'&page='.$this->SolicitudTipos->getPage());
  
  }

  public function executeNew(sfWebRequest $request)
  {
    $solic = new SolicitudTipo();
    $solic->setStatus(2);
    $solic->save();
    $solicI18n =  new SolicitudTipoI18n();
    $solicI18n->setId($solic->getIdSolicitudTipo());
    $solicI18n->setNomeSolicitud('');
    $solicI18n->setLanguage('pt');
    $solicI18n->save();
    $this->redirect('tiposolicitud/edit?id_solicitud_tipo='.$solic->getIdSolicitudTipo().'&language=pt');
  }

  public function executeEdit(sfWebRequest $request)
  {
    //Desactiva temporalmente el metodo de escape para que funcione el link Back to list
    sfConfig::set('sf_escaping_strategy', false);
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' tiposolicitud - Lynx Cms');
    $this->forward404Unless($SolicitudTipo = SolicitudTipoPeer::retrieveByPk($request->getParameter('id_solicitud_tipo')), sprintf('Object SolicitudTipo does not exist (%s).', $request->getParameter('id_solicitud_tipo')));
    $this->form = new SolicitudTipoForm($SolicitudTipo);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }
  
  public function executeSaveInfoI18n(sfWebRequest $request)
  {
    $solicitud = SolicitudTipoPeer::retrieveByPK($request->getParameter('id'));  
    $solicitud->setStatus('1');
    $SolicitudTipoI18n = SolicitudTipoI18nPeer::retrieveByPk($request->getParameter('id'),$request->getParameter('language'));
    if(!$SolicitudTipoI18n)
    {
        $this->solicitud = new SolicitudTipoI18n();
        $this->solicitud->setId($request->getParameter('id'));
        $this->solicitud->setLanguage($request->getParameter('language'));
        $this->solicitud->setNomeSolicitud($request->getParameter('nome'));
        $this->solicitud->setDescricao($request->getParameter('descripcion'));
        $this->solicitud->setPermalink(globalFunctions::crearPermalink($request->getParameter('nome')));
        $this->solicitud->save();
    }else{
        $SolicitudTipoI18n->setNomeSolicitud($request->getParameter('nome'));
        $SolicitudTipoI18n->setDescricao($request->getParameter('descripcion'));        
        $SolicitudTipoI18n->setPermalink(globalFunctions::crearPermalink($request->getParameter('nome')));
        $SolicitudTipoI18n->save();
    }  
    
    echo '1';
    return sfView::NONE;    
  }
  
  /**
   * Cambia el status del usuario
   *
   * @param sfWebRequest $request
   */
  public function executeChangeStatus(sfWebRequest $request)
  {
      $this->forward404Unless($this->SolicitudTipo = SolicitudTipoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Form does not exist (%s).', $request->getParameter('id')));
      if($request->getParameter('status'))
      {
        $this->SolicitudTipo->setStatus(0);
      }else{
        $this->SolicitudTipo->setStatus(1);
      }
      $this->SolicitudTipo->save();
  }

  public function executeUpdate(sfWebRequest $request)
  {
 
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($SolicitudTipo = SolicitudTipoPeer::retrieveByPk($request->getParameter('id_solicitud_tipo')), sprintf('Object SolicitudTipo does not exist (%s).', $request->getParameter('id_solicitud_tipo')));
    $this->form = new SolicitudTipoForm($SolicitudTipo);

    $this->processForm($request, $this->form);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($SolicitudTipo = SolicitudTipoPeer::retrieveByPk($request->getParameter('id_solicitud_tipo')), sprintf('Object SolicitudTipo does not exist (%s).', $request->getParameter('id_solicitud_tipo')));
    $SolicitudTipo->delete();
    SolicitudTipoI18nPeer::deleita($request->getParameter('id_solicitud_tipo'));

    $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));
    return $this->redirect('tiposolicitud/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $SolicitudTipo = $form->save();

      $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_save_confir')));
      if($request->getParameter('id_solicitud_tipo')){
        return $this->redirect('@default?module=tiposolicitud&action=index&'.$this->getUser()->getAttribute('uri_tiposolicitud'));
      }else{
        return $this->redirect('tiposolicitud/index');
      }
    }
  }
}
