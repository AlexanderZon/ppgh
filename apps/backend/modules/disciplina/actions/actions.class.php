<?php

/**
 * disciplina actions.
 *
 * @package    geografia
 * @subpackage disciplina
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class disciplinaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('List').' disciplina - Lynx Cms');
	if (!$this->getRequestParameter('buscador')){
			$this->buscador = '';
		}else{
			$this->buscador = $this->getRequestParameter('buscador');
		}
		if(!$this->getRequestParameter('by'))
		{
			$this->by = 'desc';               // Variable para el orden de los registros
			$this->by_page = "asc";           // Variable para el paginador y las flechas de orden
			$sortTemp =  DisciplinaPeer::getFieldNames(BasePeer::TYPE_FIELDNAME);
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
					$c->addDescendingOrderByColumn(DisciplinaPeer::$this->getRequestParameter('sort'));
					$this->by = "asc";
					$this->by_page = "desc";
					break;
				default:
					$c->addAscendingOrderByColumn(DisciplinaPeer::$this->getRequestParameter('sort'));
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
                		                                    $criterio = $c->getNewCriterion(DisciplinaPeer::ID_DISCIPLINA, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE);
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::ID_SEM, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::ID_MATERIA, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::CODIGO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::NOME_DISCIPLINA, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::PROFESOR, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::NUMERO_CREDITO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::FECHA, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::DIA, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::HORA_INICIO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::HORA_FIM, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::ESPECIAIS, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::UNESP_UNICAMP, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::REGULARES_USP, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::LOCAL_CURSO, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(DisciplinaPeer::STATUS, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                					$c->add($criterio);
			$buscador = "&buscador=".$this->buscador;
			$this->bus_pagi = "&buscador=".$this->buscador;
		}else{
			$buscador = "";
			$this->bus_pagi = "";
		}
			
		$pager = new sfPropelPager('Disciplina',10);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page',1));
		$pager->init();
		$this->Disciplinas = $pager;                
        // Crea sesion de la uri al momento
        $this->getUser()->setAttribute('uri_disciplina','sort='.$this->sort.'&by='.$this->by_page.$buscador.'&page='.$this->Disciplinas->getPage());
  
  }

  public function executeNew(sfWebRequest $request)
  {
    sfConfig::set('sf_escaping_strategy', false);
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Add new').' disciplina - Lynx Cms');
    $this->form = new DisciplinaForm();
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeCreate(sfWebRequest $request)
  {
    //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' disciplina - Lynx Cms');
    if (!$request->isMethod('post'))
    {
        $this->redirect("disciplina/new");
    }
    

    $this->form = new DisciplinaForm();
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
  	$this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' disciplina - Lynx Cms');
    $this->forward404Unless($Disciplina = DisciplinaPeer::retrieveByPk($request->getParameter('id_disciplina')), sprintf('Object Disciplina does not exist (%s).', $request->getParameter('id_disciplina')));
    $this->form = new DisciplinaForm($Disciplina);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeUpdate(sfWebRequest $request)
  {
 
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Disciplina = DisciplinaPeer::retrieveByPk($request->getParameter('id_disciplina')), sprintf('Object Disciplina does not exist (%s).', $request->getParameter('id_disciplina')));
    $this->form = new DisciplinaForm($Disciplina);

    $this->processForm($request, $this->form);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Disciplina = DisciplinaPeer::retrieveByPk($request->getParameter('id_disciplina')), sprintf('Object Disciplina does not exist (%s).', $request->getParameter('id_disciplina')));
    $Disciplina->delete();

    $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));
    return $this->redirect('disciplina/index');
  }



public function executeDeleteAll(sfWebRequest $request)
{
    if ($this->getRequestParameter('chk'))
    {
            foreach ($this->getRequestParameter('chk') as $gr => $val)
            {
                    
                    $this->forward404Unless($Disciplina = DisciplinaPeer::retrieveByPk($val), sprintf('Object Disciplina does not exist (%s).', $request->getParameter('id_disciplina')));
                    $Disciplina->delete();
            }
            $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));

    }
    return $this->redirect('disciplina/index');
}

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Disciplina = $form->save();

      $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_save_confir')));
      if($request->getParameter('id_disciplina')){
        return $this->redirect('@default?module=disciplina&action=index&'.$this->getUser()->getAttribute('uri_disciplina'));
      }else{
        return $this->redirect('disciplina/index');
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
      $this->forward404Unless($this->Disciplina = DisciplinaPeer::retrieveByPk($request->getParameter('id_disciplina')), sprintf('Object Form does not exist (%s).', $request->getParameter('id_disciplina')));
      if($request->getParameter('status'))
      {
        $this->Disciplina->setStatus(0);
      }else{
        $this->Disciplina->setStatus(1);
      }
      $this->Disciplina->save();
  }
}
