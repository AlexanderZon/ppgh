<?php

/**
 * docente actions.
 *
 * @package    Geografia
 * @subpackage docente
 * @author     Your name here
 */
class docenteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  $this->getResponse()->setTitle($this->getContext()->getI18N()->__('List').' docente - Lynx Cms');
	if (!$this->getRequestParameter('buscador')){
			$this->buscador = '';
		}else{
			$this->buscador = $this->getRequestParameter('buscador');
		}
		if(!$this->getRequestParameter('by'))
		{
			$this->by = 'desc';               // Variable para el orden de los registros
			$this->by_page = "asc";           // Variable para el paginador y las flechas de orden
			$sortTemp =  CorpoDocentePeer::getFieldNames(BasePeer::TYPE_FIELDNAME);
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
					$c->addDescendingOrderByColumn(CorpoDocentePeer::$this->getRequestParameter('sort'));
					$this->by = "asc";
					$this->by_page = "desc";
					break;
				default:
					$c->addAscendingOrderByColumn(CorpoDocentePeer::$this->getRequestParameter('sort'));
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
                		                                    $criterio = $c->getNewCriterion(CorpoDocentePeer::ID_DOCENTE, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE);
                                		                                    $criterio->addOr($c->getNewCriterion(CorpoDocentePeer::NOME_DOCENTE, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(CorpoDocentePeer::RAMAL, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(CorpoDocentePeer::SALA, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(CorpoDocentePeer::EMAIL, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(CorpoDocentePeer::SITE, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(CorpoDocentePeer::CURRICULO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                					$c->add($criterio);
			$buscador = "&buscador=".$this->buscador;
			$this->bus_pagi = "&buscador=".$this->buscador;
		}else{
			$buscador = "";
			$this->bus_pagi = "";
		}
			
		$pager = new sfPropelPager('CorpoDocente',10);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page',1));
		$pager->init();
		$this->CorpoDocentes = $pager;                
        // Crea sesion de la uri al momento
        $this->getUser()->setAttribute('uri_docente','sort='.$this->sort.'&by='.$this->by_page.$buscador.'&page='.$this->CorpoDocentes->getPage());
  
  }

  public function executeNew(sfWebRequest $request)
  {
    //Desactiva temporalmente el metodo de escape para que funcione el link Back to list
    sfConfig::set('sf_escaping_strategy', false);
    //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
  	$this->getResponse()->setTitle($this->getContext()->getI18N()->__('Add new').' docente - Lynx Cms');
    $this->form = new CorpoDocenteForm();
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeCreate(sfWebRequest $request)
  {
    //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' docente - Lynx Cms');
    if (!$request->isMethod('post'))
    {
        $this->redirect("docente/new");
    }
    

    $this->form = new CorpoDocenteForm();
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
    //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
  	$this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' docente - Lynx Cms');
    $this->forward404Unless($CorpoDocente = CorpoDocentePeer::retrieveByPk($request->getParameter('id_docente')), sprintf('Object CorpoDocente does not exist (%s).', $request->getParameter('id_docente')));
    $this->form = new CorpoDocenteForm($CorpoDocente);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeUpdate(sfWebRequest $request)
  {
 
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($CorpoDocente = CorpoDocentePeer::retrieveByPk($request->getParameter('id_docente')), sprintf('Object CorpoDocente does not exist (%s).', $request->getParameter('id_docente')));
    $this->form = new CorpoDocenteForm($CorpoDocente);

    $this->processForm($request, $this->form);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($CorpoDocente = CorpoDocentePeer::retrieveByPk($request->getParameter('id_docente')), sprintf('Object CorpoDocente does not exist (%s).', $request->getParameter('id_docente')));
    $CorpoDocente->delete();

    $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));
    return $this->redirect('docente/index');
  }

  public function executeDeleteImage(sfWebRequest $request)
  {
    $this->forward404Unless($Model = CorpoDocentePeer::retrieveByPk($request->getParameter('id')), sprintf('Object Model does not exist (%s).', $request->getParameter('id')));
    //Delete images process
    if ($Model->getPhoto())
    {
      $appYml = sfConfig::get('app_upload_images_docente');
      $uploadDir = sfConfig::get('sf_upload_dir').'/docente/';
      for($i=1;$i<=$appYml['copies'];$i++)
      {
        //Delete images from uploads directory
        if(is_file($uploadDir.$appYml['size_'.$i]['pref_'.$i].'_'.$Model->getPhoto()))
        {
          
          unlink($uploadDir.$appYml['size_'.$i]['pref_'.$i].'_'.$Model->getPhoto());
        }
      }
    }
    $Model->setPhoto('');
    $Model->save();
  }


public function executeDeleteAll(sfWebRequest $request)
{
    if ($this->getRequestParameter('chk'))
    {
            foreach ($this->getRequestParameter('chk') as $gr => $val)
            {
                    
                    $this->forward404Unless($CorpoDocente = CorpoDocentePeer::retrieveByPk($val), sprintf('Object CorpoDocente does not exist (%s).', $request->getParameter('id_docente')));
                    $CorpoDocente->delete();
            }
            $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));

    }
    return $this->redirect('docente/index');
}

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $CorpoDocente = $form->save();
      //Image process
      if($form->getValue('photo'))
      {
          $file = $form->getValue('photo');
          $Model = CorpoDocentePeer::retrieveByPK($CorpoDocente->getIdDocente());
          // Aqui cargo la imagen con la funcion loadFiles de mi Helper
          sfProjectConfiguration::getActive()->loadHelpers('uploadFile');
          $fileUploaded = loadFiles($file->getOriginalName(), $file->getTempname(), 0, sfConfig::get('sf_upload_dir').'/docente/', $CorpoDocente->getIdDocente(), false);
          $Model->setPhoto($fileUploaded);
          $Model->save();
      }
      $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_save_confir')));
      if($request->getParameter('id_docente')){
        return $this->redirect('@default?module=docente&action=index&'.$this->getUser()->getAttribute('uri_docente'));
      }else{
        return $this->redirect('docente/index');
      }
    }
  }
}
