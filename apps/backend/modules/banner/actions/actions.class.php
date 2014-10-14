<?php

/**
 * banner actions.
 *
 * @package    geografia
 * @subpackage banner
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class bannerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
        $this->getResponse()->setTitle($this->getContext()->getI18N()->__('List').' banner - Lynx Cms');
	if (!$this->getRequestParameter('buscador')){
			$this->buscador = '';
		}else{
			$this->buscador = $this->getRequestParameter('buscador');
		}
		if(!$this->getRequestParameter('by'))
		{
			$this->by = 'desc';               // Variable para el orden de los registros
			$this->by_page = "asc";           // Variable para el paginador y las flechas de orden
			$sortTemp =  BannerI18nPeer::getFieldNames(BasePeer::TYPE_FIELDNAME);
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
					$c->addDescendingOrderByColumn(BannerI18nPeer::$this->getRequestParameter('sort'));
					$this->by = "asc";
					$this->by_page = "desc";
					break;
				default:
					$c->addAscendingOrderByColumn(BannerI18nPeer::$this->getRequestParameter('sort'));
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
                		                                    $criterio = $c->getNewCriterion(BannerI18nPeer::ID_BANNER, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE);
                                		                                    $criterio->addOr($c->getNewCriterion(BannerI18nPeer::PREFIJO_NOME_BANNER, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                		                                    $criterio->addOr($c->getNewCriterion(BannerI18nPeer::STATUS, '%'.$this->getRequestParameter('buscador').'%', Criteria::LIKE));
                                					$c->add($criterio);
			$buscador = "&buscador=".$this->buscador;
			$this->bus_pagi = "&buscador=".$this->buscador;
		}else{
			$buscador = "";
			$this->bus_pagi = "";
		}
			
		$pager = new sfPropelPager('BannerI18n',10);
		$pager->setCriteria($c);
		$pager->setPage($this->getRequestParameter('page',1));
		$pager->init();
		$this->BannerI18ns = $pager;                
        // Crea sesion de la uri al momento
        $this->getUser()->setAttribute('uri_banner','sort='.$this->sort.'&by='.$this->by_page.$buscador.'&page='.$this->BannerI18ns->getPage());
  
  }

  public function executeNew(sfWebRequest $request)
  {
    sfConfig::set('sf_escaping_strategy', false);
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Add new').' banner - Lynx Cms');
    $this->form = new BannerI18nForm();
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeCreate(sfWebRequest $request)
  {
    //PERSONALIZAR SEGUN LA NECESIDAD DEL MODULO
    $this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' banner - Lynx Cms');
    if (!$request->isMethod('post'))
    {
        $this->redirect("banner/new");
    }
    

    $this->form = new BannerI18nForm();
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
  	$this->getResponse()->setTitle($this->getContext()->getI18N()->__('Edit').' banner - Lynx Cms');
    $this->forward404Unless($BannerI18n = BannerI18nPeer::retrieveByPk($request->getParameter('id_banner')), sprintf('Object BannerI18n does not exist (%s).', $request->getParameter('id_banner')));
    $this->form = new BannerI18nForm($BannerI18n);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
  }

  public function executeUpdate(sfWebRequest $request)
  {
 
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($BannerI18n = BannerI18nPeer::retrieveByPk($request->getParameter('id_banner')), sprintf('Object BannerI18n does not exist (%s).', $request->getParameter('id_banner')));
    $this->form = new BannerI18nForm($BannerI18n);

    $this->processForm($request, $this->form);
    //Identifica el modulo padre
    $idParentModule = LxModulePeer::getParentIdXSfModule($this->getModuleName());
    $this->moduleParent = LxModulePeer::getParentNameXParentId($idParentModule['parent_id']);
    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($BannerI18n = BannerI18nPeer::retrieveByPk($request->getParameter('id_banner')), sprintf('Object BannerI18n does not exist (%s).', $request->getParameter('id_banner')));
    //Delete images process
    $cultures = SfLanguagePeer::listTabLanguages();
    if ($BannerI18n->getPrefijoNomeBanner())
    {
      $uploadDir = sfConfig::get('sf_upload_dir').'/banner/';
      foreach ($cultures as $culture)
      {
        //Delete images from uploads directory
        if(is_file($uploadDir.'/'.$culture->getLanguage().'-banner-'.$BannerI18n->getPrefijoNomeBanner()))
        {
          unlink($uploadDir.$culture->getLanguage().'-banner-'.$BannerI18n->getPrefijoNomeBanner());
        }
      }
    }
    $BannerI18n->delete();
    $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_delete_confir')));
    return $this->redirect('banner/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $BannerI18n = $form->save();
      $cultures = SfLanguagePeer::listTabLanguages();
      foreach ($cultures as $culture)
      {
          $lang = $culture->getLanguage();
          if($form->getValue('arquivo_'.$lang))
          {
            $file = $this->form->getValue('arquivo_'.$lang);
            $diretorio =  sfConfig::get('sf_upload_dir').'/banner/';
            sfProjectConfiguration::getActive()->loadHelpers('uploadI18n');
            $fileUploaded = loadFileI18n($file->getOriginalName(), $file->getTempname(), 0, $diretorio , $lang.'-banner-'.$BannerI18n->getIdBanner(), true);          
            $fileUploaded = explode("-banner-", $fileUploaded);
            $nomearquivo = $fileUploaded[1];
            $BannerI18n->setPrefijoNomeBanner($nomearquivo);
            $BannerI18n->save();                
          }
      }
      if(!$request->getParameter('id_banner')){
          $BannerI18n->setStatus('1');
          $BannerI18n->save();
      }

      $this->getUser()->setFlash('listo', $this->getContext()->getI18N()->__(sfConfig::get('app_msn_save_confir')));
      return $this->redirect('banner/index');
    }
  }
  
  public function executeDeleteImage(sfWebRequest $request)
  {
    $this->forward404Unless($Model = BannerI18nPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Model does not exist (%s).', $request->getParameter('id')));
    //Delete images process
    if ($Model->getPrefijoNomeBanner())
    {
        $uploadDir = sfConfig::get('sf_upload_dir').'/banner/';
        //Delete images from uploads directory by language
        if(is_file($uploadDir.'/'.$request->getParameter('lang').'-banner-'.$Model->getPrefijoNomeBanner()))
        {
          unlink($uploadDir.'/'.$request->getParameter('lang').'-banner-'.$Model->getPrefijoNomeBanner());
        }      
    }
    $Model->save();
  }
  
  public function executeChangeStatus(sfWebRequest $request)
  {
      $this->forward404Unless($this->Banner = BannerI18nPeer::retrieveByPk($request->getParameter('id_banner')), sprintf('Object Banner does not exist (%s).', $request->getParameter('id_banner')));
      if($request->getParameter('status'))
      {
        $this->Banner->setStatus(0);
      }else{
        $this->Banner->setStatus(1);
      }
      $this->Banner->save();
  }
}
