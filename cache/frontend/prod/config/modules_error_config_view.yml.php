<?php
// auto-generated by sfViewConfigHandler
// date: 2014/04/02 10:29:35
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layoutError' ? false : 'layoutError'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'Error page', false, false);
  $response->addMeta('description', 'DEPARTAMENTO DE GEOGRAFIA - FACULDADE DE FILOSOFIA, LETRAS E CIÊNCIAS HUMANAS - UNIVERSIDADE DE SÃO PAULO', false, false);
  $response->addMeta('keywords', 'Geografia Humana, USP, Programa, Pós-Graduação, PPGH', false, false);
  $response->addMeta('language', 'en', false, false);
  $response->addMeta('robots', 'index, follow', false, false);

  $response->addStylesheet('main', '', array ());


