<?php

class componentComponents extends sfComponents {

  public function executeMenu(sfWebRequest $request)
  {
      $this->sections = ExtendSfSection::searchParentSection($this->getUser()->getCulture());
  }
  
  public function executeEmpresa(sfWebRequest $request)
  {
      
  }
  
  public function executeCalendario(sfWebRequest $request)
  {
      $this->functions = new globalFunctions();      
      $this->mes_atual = date("n");
      $this->ano_atual = date("Y");
      $this->dias_mes = $this->functions->diasMes($this->mes_atual,$this->ano_atual);
      $this->begin_dia_mes = date('w',  mktime(0,0,0,$this->mes_atual,'01',$this->ano_atual));
      $this->eventosMes = EventosPeer::getEventosMes($request->getParameter('sf_culture'), $this->mes_atual, $this->ano_atual, $this->dias_mes);
      
  }
  
  public function executeDisciplinas(sfWebRequest $request)
  {
      $this->semestres = SemestresPeer::getSemestres();            
  }
  
  public function executeHome()
  {
    $this->language = sfContext::getInstance()->getUser()->getCulture();
    $this->noticiasPPal = SfNewsPeer::getNoticiasRecientes(3,1,$this->language);
    $this->noticias = SfNewsPeer::getNoticiasRecientes(3,3, $this->language);
    $this->ultimasNoticias = SfNewsPeer::getUltimasNoticias(2, $this->language);
  }
  
  public function executeColDerecha(sfWebRequest $request)
  {
      $this->language = sfContext::getInstance()->getUser()->getCulture();
      $this->tipo_solicitudes = SolicitudTipoPeer::getTiposSolicitudes($this->language);   
  }
  
  public function executeSolicitudes(sfWebRequest $request)
  {
      $this->language = sfContext::getInstance()->getUser()->getCulture();
      $current_action = sfContext::getInstance()->getActionStack()->getLastEntry()->getActionInstance();
      $this->dataTipo = SolicitudTipoI18nPeer::getTipoByPermalink($this->getRequestParameter('subseccion'), $this->language) ;
      $this->status_tipo = SolicitudTipoPeer::retrieveByPK($this->dataTipo->getId());
      $current_action->forward404If(!$this->dataTipo);
      $this->form = new SolicitudForm();
      if ($request->isMethod('post')) {
        $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
        if ($this->form->isValid()) {
            $Solicitud = $this->form->save();
            $dir_arquivo =  sfConfig::get('sf_upload_dir').'/solicitudes/';
            if($this->form->getValue('sugestao_banca'))
            {
                $file = $this->form->getValue('sugestao_banca');
                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'sugestao_banca_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setSugestaoBanca($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_plano_trabalho'))
            {
                $file = $this->form->getValue('arq_plano_trabalho');
                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'plano_trabalho_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqPlanoTrabalho($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_justificativa'))
            {
                $file = $this->form->getValue('arq_justificativa');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'justificativa_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqJustificativa($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_orcamento'))
            {
                $file = $this->form->getValue('arq_orcamento');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'orcamento_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqOrcamento($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_curriculo_Latted'))
            {
                $file = $this->form->getValue('arq_curriculo_Latted');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'curriculo_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqCurriculoLatted($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_pedido_do_interessado'))
            {
                $file = $this->form->getValue('arq_pedido_do_interessado');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'pedido_do_interessado_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqPedidoDoInteressado($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_credenciamento'))
            {
                $file = $this->form->getValue('arq_credenciamento');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'credeciamento_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqCredenciamento($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_prof_externo'))
            {
                $file = $this->form->getValue('arq_prof_externo');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'prof_externo_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqProfExterno($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_cadastro_docente_externo'))
            {
                $file = $this->form->getValue('arq_cadastro_docente_externo');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'docente_externo_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqCadastroDocenteExterno($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_carta_aluno'))
            {
                $file = $this->form->getValue('arq_carta_aluno');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'carta_aluno_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqCartaAluno($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_manifestacao_orientador'))
            {
                $file = $this->form->getValue('arq_manifestacao_orientador');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'manifestacao_orientador_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqManifestacaoOrientador($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_cronograma_actividades'))
            {
                $file = $this->form->getValue('arq_cronograma_actividades');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'cronograma_actividades_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqCronogramaActividades($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_copia_trabalho'))
            {
                $file = $this->form->getValue('arq_copia_trabalho');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'copia_trabalho_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqCopiaTrabalho($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_comprobante'))
            {
                $file = $this->form->getValue('arq_comprobante');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'comprobante_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqComprobante($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_transferenca_orientacao'))
            {
                $file = $this->form->getValue('arq_transferenca_orientacao');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'transferenca_orientacao_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqTransferencaOrientacao($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_termo_orientador'))
            {
                $file = $this->form->getValue('arq_termo_orientador');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'termo_orientador_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqTermoOrientador($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_relatorio_qualificacao'))
            {
                $file = $this->form->getValue('arq_relatorio_qualificacao');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'relatorio_qualificacao_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqRelatorioQualificacao($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_projeto_pesquisa'))
            {
                $file = $this->form->getValue('arq_projeto_pesquisa');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'projeto_pesquisa_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqProjetoPesquisa($fileUploaded);
                $Solicitud->save();                
            }
            if($this->form->getValue('arq_solicitacao_bolsa'))
            {
                $file = $this->form->getValue('arq_solicitacao_bolsa');                
                sfProjectConfiguration::getActive()->loadHelpers('upload');
                $fileUploaded = loadFile($file->getOriginalName(), $file->getTempname(), 0, $dir_arquivo , 'solicitacao_bolsa_'.$Solicitud->getIdSolicitud(), true);          
                $Solicitud->setArqSolicitacaoBolsa($fileUploaded);
                $Solicitud->save();                
            }
            $this->getUser()->setFlash('listo','Seu informação foi enviado com sucesso! Em breve responderemos.');
            $current_action = sfContext::getInstance()->getActionStack()->getLastEntry()->getActionInstance();
            $mail = new sendMail();
            if($mail->mailSolicitud($this->form, $this->language))
            {
                $this->getUser()->setFlash('listo','Sua solicitação foi enviada com sucesso! Em breve responderemos.');
            }else{
                $this->getUser()->setFlash('error','O envio teve alguns problemas. Por favor tente novamente.');
            }
            $current_action->redirect('@submenu?secciones=solicitudes&subseccion='.$this->getRequestParameter('subseccion'));
        }
        else{
            $this->getUser()->setFlash('error',sfConfig::get('app_msn_save_err'));
        }
      }
  }
  
  public function executeFooter(sfWebRequest $request)
  {
    $this->nucleo = $request->getParameter('nucleo');
    $this->counter = CounterPeer::getCounter();    
    if(!$this->nucleo)
    {
        
        $this->nucleo = 'carapicuiba';
        CounterPeer::incrementa($this->counter->getCount() + 1);
    }
    $this->counter = CounterPeer::getCounter();
    $this->sections  = ExtendSfSection::searchSectionFooter($this->getUser()->getCulture());
    $this->swContact = ExtendSfSection::searcSwicheMenu(20);
    
    
  }
  
  public function executeNews(sfWebRequest $request)
  {
      $current_action = sfContext::getInstance()->getActionStack()->getLastEntry()->getActionInstance();
      $this->valida = new lynxValida();
      if($this->getRequestParameter('permalink'))
      {
          $this->news = SfNewsPeer::selectNewsDetail($this->getRequestParameter('permalink'), $request->getParameter('sf_culture'));
          $current_action->forward404If(!$this->news);
      }
  }
  
  public function executeEventos(sfWebRequest $request)
  {
      $current_action = sfContext::getInstance()->getActionStack()->getLastEntry()->getActionInstance();
      $this->valida = new lynxValida();
      if($this->getRequestParameter('permalink'))
      {
          $this->evento = EventosPeer::selectEventDetail($this->getRequestParameter('permalink'), $request->getParameter('sf_culture'));
          $current_action->forward404If(!$this->evento);
      }
  }
  
  public function executeBusca(sfWebRequest $request)
  {
      $this->busca = trim($request->getParameter('buscador'));
      $this->secciones = SfSectionI18nPeer::getBuscaSecciones($this->getUser()->getCulture(), $this->busca);
      $this->noticias = SfNewsI18nPeer::getBuscaNoticias($this->getUser()->getCulture(), $this->busca);
      $this->eventos = EventosI18nPeer::getBuscaEventos($this->getUser()->getCulture(), $this->busca);
      
      $this->val = new lynxValida();      
  }
  
  
  public function executeCorpoDocente(sfWebRequest $request)
  {
    $this->docentes = CorpoDocentePeer::getCorpoDocente(); 
  }
  
  public function executeFormulario(sfWebRequest $request)
  {
    $this->formularios = FormularioPeer::getFormularios(); 
  }

  public function executePagination(sfWebRequest $request)
  {
    if($request->hasParameter('subseccion'))
    {
      $this->enlace = '@pager?secciones='.$request->getParameter('secciones').'&subseccion='.$request->getParameter('subseccion');
    }else{
      $this->enlace = '@menu?secciones='.$request->getParameter('secciones');
    }
    $this->enlace = urlencode($this->enlace);
  }

  public function executeContact(sfWebRequest $request) 
 {
      
      $mail = new sendMail();
      if ($request->isMethod('post')) 
      {
          $current_action = sfContext::getInstance()->getActionStack()->getLastEntry()->getActionInstance();
          if($mail->mailContato($request))
            {
                $this->getUser()->setFlash('listo','Seu e-mail foi enviado com sucesso! Em breve responderemos.');
            }else{
                $this->getUser()->setFlash('error','O envio teve alguns problemas. Por favor tente novamente.');
            }
            $current_action->redirect('@menu?secciones=contato');
      }
  }  
  
}
?>
