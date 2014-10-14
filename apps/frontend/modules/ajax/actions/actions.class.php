<?php
/**
 * localidades actions.
 *
 * @package     Geografia
 * @subpackage  ajax
 * @author      Henry Vallenilla <henryvallenilla@gmail.com>
 * @version     SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class ajaxActions extends sfActions {

  public function executeGetCiudades(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->items = null;
    if($id != '' && $id != '-1'){
      $this->items = CiudadesPeer::getCiudadesByEstado($id);
    }
  }
  
  /**
    * Lista Ajax Noticias
    * @param sfWebRequest $request
    */
   public function executeNews(sfWebRequest $request)
   {
       $global = new globalFunctions();
       $page = $request->getParameter('page');
       $this->palabra = $request->getParameter('palabra');
       $this->seccion = 'noticias';
       $this->language = $this->getUser()->getCulture();
       $cur_page = $page;
       $page -= 1;
       $per_page = 7;
       $start = $page * $per_page;
        
       $this->lista = SfNewsPeer::getNewsPagination($this->language, $start, $per_page, $this->palabra); 
       $this->total = SfNewsPeer::getCount($this->language, $this->palabra);
       
       $no_of_paginations = ceil($this->total / $per_page);
       $this->paginator = $global->generatePaginator($cur_page, $no_of_paginations);        
   }
  /**
    * Lista Ajax Noticias
    * @param sfWebRequest $request
    */
   public function executeEventos(sfWebRequest $request)
   {
       $global = new globalFunctions();
       $page = $request->getParameter('page');
       $this->palabra = $request->getParameter('palabra');
       $this->language = $this->getUser()->getCulture();
       $this->fecha = '';
       $this->seccion = 'eventos';
       $cur_page = $page;
       $page -= 1;
       $per_page = 7;
       $start = $page * $per_page;
       // Chequea si esta llegando link del calendario de eventos
       $detecta = explode("-event-",$this->getRequestParameter('subseccion'));
       if(@$detecta[1])
       {
           $this->fecha = $detecta[1];
       }

       $this->lista = EventosPeer::getEventosPagination($this->language, $start, $per_page, $this->palabra, $this->fecha ); 
       $this->total = EventosPeer::getCount($this->language,$this->palabra, $this->fecha );
       
       $no_of_paginations = ceil($this->total / $per_page);
       $this->paginator = $global->generatePaginator($cur_page, $no_of_paginations, 'loadDataEventos');        
   }
  
   public function executeDetalleDisciplina(sfWebRequest $request)
   {
       $this->setLayout(false);
       $this->sfValid = new lynxValida();
       $this->id_semestre = $request->getParameter('id_sem');
       $this->semestre = SemestresPeer::retrieveByPK($this->id_semestre);
       $this->discplinas = DisciplinaPeer::getDisciplinas($this->id_semestre);
   }
  
   public function executeGetDiasMes(sfWebRequest $request)
   {
       $this->setLayout(false);
       $this->functions = new globalFunctions();      
       $this->valor = $request->getParameter('val');
       $dato = explode('_', $this->valor);
       $this->accion = $dato[0];
       $this->ano_atual = $dato[1];
       $this->mes_atual = $dato[2];
       switch ($this->accion) {
           case 'inc':
               $calculo = date("n-Y", strtotime("$this->ano_atual-$this->mes_atual-01 + 1 months"));
               $exp = explode('-', $calculo);
               $this->mes_atual = $exp[0];
               $this->ano_atual = $exp[1];
               break;
           default:
               $calculo = date("n-Y", strtotime("$this->ano_atual-$this->mes_atual-01 - 1 months"));
               $exp = explode('-', $calculo);
               $this->mes_atual = $exp[0];
               $this->ano_atual = $exp[1];
               break;
       }
       $this->dias_mes = $this->functions->diasMes($this->mes_atual,$this->ano_atual);
       $this->begin_dia_mes = date('w',  mktime(0,0,0,$this->mes_atual,'01',$this->ano_atual));
       $this->eventosMes = EventosPeer::getEventosMes($this->getUser()->getCulture(), $this->mes_atual, $this->ano_atual, $this->dias_mes);
       
   }
   
   
   
}