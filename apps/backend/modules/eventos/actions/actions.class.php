<?php

/**
 * eventos actions.
 *
 * @package    geografia
 * @subpackage eventos
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class eventosActions extends sfActions
{
  public function preExecute() {
        $languagePrincipal = SfLanguagePeer::getLanguagePrincipal();
        $this->language = $languagePrincipal['language'];
  }
  
  public function executeIndex(sfWebRequest $request)
  {
        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Lista').' de eventos - Lynx Cms');
	if (!$this->getRequestParameter('buscador')){
			$this->buscador = '';
		}else{
			$this->buscador = $this->getRequestParameter('buscador');
		}
		if(!$this->getRequestParameter('by'))
		{
			$this->by = 'desc';               // Variable para el orden de los registros
			$this->by_page = "asc";           // Variable para el paginador y las flechas de orden
			$sortTemp =  EventosPeer::getFieldNames(BasePeer::TYPE_FIELDNAME);
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
				  $c->addDescendingOrderByColumn(EventosPeer::$this->getRequestParameter('sort'));
					$this->by = "asc";
					$this->by_page = "desc";
					break;
				default:
					$c->addAscendingOrderByColumn(EventosPeer::$this->getRequestParameter('sort'));
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
      $criterio = $c->getNewCriterion(EventosPeer::ID_EVENTO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE);
      $criterio->addOr($c->getNewCriterion(EventosPeer::TITULO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
      $criterio->addOr($c->getNewCriterion(EventosPeer::RESUMEN, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
      $criterio->addOr($c->getNewCriterion(EventosPeer::DESCRIPCION, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
      $criterio->addOr($c->getNewCriterion(EventosPeer::FECHA_INICIO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
      $criterio->addOr($c->getNewCriterion(EventosPeer::FECHA_FIN, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
      $criterio->addOr($c->getNewCriterion(EventosPeer::IMAGEN, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
      $criterio->addOr($c->getNewCriterion(EventosPeer::STATUS, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
      $criterio->addOr($c->getNewCriterion(EventosPeer::PERMALINK, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
      $c->add($criterio);
			$buscador = "&buscador=".$this->buscador;
			$this->bus_pagi = "&buscador=".$this->buscador;
    }else{
			$buscador = "";
			$this->bus_pagi = "";
		}
			
		$pager = new sfPropelPager('eventos',10);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page',1));
		$pager->init();
		$this->eventoss = $pager;                
    // Crea sesion de la uri al momento
    $this->getUser()->setAttribute('uri_eventos','sort='.$this->sort.'&by='.$this->by_page.$buscador.'&page='.$this->eventoss->getPage());
  }

  public function executeNew(sfWebRequest $request)
  {
        $evento = new Eventos();
        $evento->setStatus(2);
        $evento->save();
        $eventoI18n =  new EventosI18n();
        $eventoI18n->setId($evento->getIdEvento());
        $eventoI18n->setTitulo('');
        $eventoI18n->setLanguage('pt');
        $eventoI18n->save();
        $this->redirect('eventos/edit?id_evento='.$evento->getIdEvento().'&language=pt');
  }

  public function executeEdit(sfWebRequest $request)
  {
    //Desactiva temporalmente el metodo de escape para que funcione el link Back to list
    sfConfig::set('sf_escaping_strategy', false);
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Editar').' evento - Lynx Cms');
    $this->forward404Unless($eventos = EventosPeer::retrieveByPk($request->getParameter('id_evento')), sprintf('Object eventos does not exist (%s).', $request->getParameter('id_evento')));
    $this->form = new eventosForm($eventos);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Editar').' evento - Lynx Cms');
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($eventos = EventosPeer::retrieveByPk($request->getParameter('id_evento')), sprintf('Object eventos does not exist (%s).', $request->getParameter('id_evento')));
    $this->form = new eventosForm($eventos);

    $this->processForm($request, $this->form);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
    $this->setTemplate('edit');
  }
  
  public function executeSaveInfoI18n(sfWebRequest $request)
  {
    $evento = EventosPeer::retrieveByPK($request->getParameter('id'));  
    $evento->setStatus('1');
    $EventoI18n = EventosI18nPeer::retrieveByPk($request->getParameter('id'),$request->getParameter('language'));
    if(!$EventoI18n)
    {
        $this->evento = new EventosI18n();
        $this->evento->setId($request->getParameter('id'));
        $this->evento->setLanguage($request->getParameter('language'));
        $this->evento->setTitulo($request->getParameter('nome_evento'));
        $this->evento->setResumen($request->getParameter('resumen'));
        $this->evento->setDescripcion($request->getParameter('descripcion'));
        $this->evento->setPermalink(globalFunctions::crearPermalink($request->getParameter('nome_evento')));
        $this->evento->save();
    }else{
        $EventoI18n->setTitulo($request->getParameter('nome_evento'));
        $EventoI18n->setResumen($request->getParameter('resumen'));
        $EventoI18n->setDescripcion($request->getParameter('descripcion'));
        $EventoI18n->setPermalink(globalFunctions::crearPermalink($request->getParameter('nome_evento')));
        $EventoI18n->save();
    }  
    echo '1';
    return sfView::NONE;    
  }

  public function executeLoadFormi18n(sfWebRequest $request)
  {
      $evento = EventosPeer::retrieveByPK($request->getParameter('id')); 
      $this->culture = $request->getParameter('language');
      $this->EventoI18n = EventosI18nPeer::retrieveByPk($request->getParameter('id'),$request->getParameter('language'));
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->forward404Unless($eventos = EventosPeer::retrieveByPk($request->getParameter('id_evento')), sprintf('Object eventos does not exist (%s).', $request->getParameter('id_evento')));
    
    //Borrado de imagen
    $request->setParameter('id', $request->getParameter('id_evento'));
    $this->executeDeleteImage($request);

    //Borrado del registro
    $eventos->delete();
    EventosI18nPeer::deleita($request->getParameter('id_evento'));

    $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));
    return $this->redirect('eventos/index');
  }

  public function executeDeleteAll(sfWebRequest $request)
  {
    if ($this->getRequestParameter('chk'))
    {
      foreach ($this->getRequestParameter('chk') as $gr => $val)
      {
        $this->forward404Unless($eventos = EventosPeer::retrieveByPk($val), sprintf('Object eventos does not exist (%s).', $val));
        
        //Borrado de imagen
        $request->setParameter('id', $val);
        $this->executeDeleteImage($request);
    
        //Borrado del registro
        $eventos->delete();
      }
      $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));
    }
    return $this->redirect('eventos/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      //En caso de edicion de la imagen se elimina la anterior
      if($form->getValue('id_evento') && $form->getValue('imagen'))
      {
        //Se elimina la imagen previa en caso de edicion
        $request->setParameter('id', $form->getValue('id_evento'));
        $this->executeDeleteImage($request);
      }
      $eventos = $form->save();
      
      //Image process
      if($form->getValue('imagen'))
      {
        //Procesamiento de la imagen
        $file = $form->getValue('imagen');
        $model = $eventos;

        // Aqui cargo la imagen con la funcion loadFiles de mi Helper
        sfProjectConfiguration::getActive()->loadHelpers('uploadFile');
        $fileUploaded = loadFiles($file->getOriginalName(), $file->getTempname(), 0, sfConfig::get('sf_upload_dir').'/eventos/', $model->getIdEvento(), false);
        $model->setImagen($fileUploaded);
        $model->save();
      }

      $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_save_confir')));
      if($request->getParameter('id_evento')){
        return $this->redirect('@default?module=eventos&action=index&'.$this->getUser()->getAttribute('uri_eventos'));
      }else{
        return $this->redirect('eventos/index');
      }
    }
  }
  
  public function executeDeleteImage(sfWebRequest $request)
  {
    $this->forward404Unless($Model = EventosPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Model does not exist (%s).', $request->getParameter('id')));
    
    //Delete images process
    if ($Model->getImagen())
    {
      $appYml = sfConfig::get('app_upload_images_eventos');
      $uploadDir = sfConfig::get('sf_upload_dir').'/eventos/';
      for($i=1;$i<=$appYml['copies'];$i++)
      {
        //Delete images from uploads directory
        if(is_file($uploadDir.$appYml['size_'.$i]['pref_'.$i].'_'.$Model->getImagen()))
        {
          unlink($uploadDir.$appYml['size_'.$i]['pref_'.$i].'_'.$Model->getImagen());
        }
      }
    }
    $Model->setImagen('');
    $Model->save();
  }

}
