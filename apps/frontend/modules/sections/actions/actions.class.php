<?php

/**
 * sections actions.
 *
 * @package    Geografía
 * @subpackage sections
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sectionsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {      
    $this->infoSecciones = array();
    if (!$request->getParameter('sf_culture'))
    {
      if ($this->getUser()->isFirstRequest())
      {
        $culture = $request->getPreferredCulture(array('pt'));
        
        $this->getUser()->setCulture($culture);
        $this->getUser()->isFirstRequest(false);
      }
      else
      {
        $culture = $this->getUser()->getCulture();
        $culture = explode('_', $culture);
        $this->getUser()->setCulture($culture[0]);        
      }
      $this->redirect('@localized_homepage');
    }
    
    $this->culture = $request->getParameter('sf_culture');
    $this->prinSeccion = $this->principalSection();
    
    $this->infoSeccionPadre = ExtendSfSection::validateSwitcheMenu($this->getRequestParameter('secciones', 'home'),$this->culture);
    $this->seccion = $this->getRequestParameter('secciones', 'home');
    
    if ($this->getRequestParameter('subseccion')){
        $subContenido = '';
        //Valida que la subseccion sea una seccion para cargar su contenido
        if(ExtendSfSection::validateSwitcheMenu($this->getRequestParameter('subseccion'))){
            $this->seccion=$this->getRequestParameter('subseccion');
        }
    }
    
    if($this->getRequestParameter('permalink')){
    	//Valida que la subseccion02 sea una seccion para cargar su contenido
        $c = new Criteria();
    	if(ExtendSfSection::validateSwitcheMenu($this->getRequestParameter('permalink'), $this->culture)){
            $this->seccion=$this->getRequestParameter('permalink');
    	}
    }
    $this->infoSecciones = $this->searchInfoSection($this->seccion, $this->culture,$this->prinSeccion); 
  }

  private function principalSection() {
    $prinSeccion = ExtendSfSection::principalSection();
    $this->forward404Unless($prinSeccion);
    return $prinSeccion->getSwMenu();
  }

  private function searchInfoSection($seccion,$idioma_principal,$seccionPrincipal){
    
    $infoSecciones = array();
    $rs = ExtendSfSection::searchInfoSection($seccion,$idioma_principal);

    //Se recuperan los registros y se genera arreglo
    $infoSeccion['totalRsult'] = $rs->rowCount();
    while ($res=$rs->fetch())
    {
      $infoSeccion['id_banner'] = $res['ID_BANNER'];
      $infoSeccion['sw_menu'] = $res['SW_MENU'];
      $infoSeccion['specialPage'] = $res['SPECIAL_PAGE'];
      $infoSeccion['showText'] = $res['SHOW_TEXT'];
      $infoSeccion['onlyComplement'] = $res['ONLY_COMPLEMENT'];
      $infoSeccion['nameSection'] = $res['NAME_SECTION'];
      $infoSeccion['descripSection'] = $res['DESCRIP_SECTION'];
      $infoSeccion['metaDescription'] = $res['META_DESCRIPTION'];
      $infoSeccion['metaKeyword'] = $res['META_KEYWORD'];
      $infoSeccion['id'] = $res['ID'];
      $infoSeccion['metaTitle'] = $res['META_TITLE'];
      $infoSeccion['idParent'] = $res['ID_PARENT'];

      if ($seccion!=$seccionPrincipal){
         if($infoSeccion['metaTitle']){
         	$this->getResponse()->setTitle($infoSeccion['nameSection']." - ".$infoSeccion['metaTitle']." - ".sfConfig::get('app_namecompany'));
         }else{
         	$this->getResponse()->setTitle($infoSeccion['nameSection']." - ".sfConfig::get('app_namecompany'));
         }
      }
      if($infoSeccion['metaDescription']){
         $this->getResponse()->addMeta('Description', $infoSeccion['metaDescription']);
      }
      if($infoSeccion['metaKeyword']){
       $this->getResponse()->addMeta('keywords', $infoSeccion['metaKeyword']);
      }

      $infoSecciones[] = $infoSeccion;
    }

    if(!empty($infoSecciones)){
      return $infoSecciones;
    }else{
      $this->forward('error','index');
    }
  }
}
