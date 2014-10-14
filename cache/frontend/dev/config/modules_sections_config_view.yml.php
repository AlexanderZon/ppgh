<?php
// auto-generated by sfViewConfigHandler
// date: 2014/03/28 15:12:34
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html; charset=utf-8', false);
  $response->addMeta('title', 'PPGH - PROGRAMA DE PÓS-GRADUAÇÃO EM GEOGRAFIA HUMANA/FFLCH/USP', false, false);
  $response->addMeta('description', 'DEPARTAMENTO DE GEOGRAFIA - FACULDADE DE FILOSOFIA, LETRAS E CIÊNCIAS HUMANAS - UNIVERSIDADE DE SÃO PAULO', false, false);
  $response->addMeta('keywords', 'Geografia Humana, USP, Programa, Pós-Graduação, PPGH', false, false);
  $response->addMeta('language', 'en', false, false);
  $response->addMeta('robots', 'index, follow', false, false);

  $response->addStylesheet('style.css', '', array ());
  $response->addStylesheet('nivo-slider.css', '', array ());
  $response->addStylesheet('orbit.css', '', array ());
  $response->addJavascript('jquery-1.5.1.min.js', '', array ());
  $response->addJavascript('jquery.min.js', '', array ());
  $response->addJavascript('jquery.orbit.min.js', '', array ());
  $response->addJavascript('jquery.nivo.slider.pack.js', '', array ());
  $response->addJavascript('cufon-yui.js', '', array ());
  $response->addJavascript('paginate.js', '', array ());


