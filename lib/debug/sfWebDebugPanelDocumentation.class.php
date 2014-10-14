<?php

class acWebDebugPanelDocumentation extends sfWebDebugPanel
{
  public function getTitle()
  {
    return '<img src="/images/icons/sistema.png" alt="Documentation Shortcuts" height="20" width="18" /> APP';
  }
 
  public function getPanelTitle()
  {
    return 'Documentation';
  }
 
  public function getPanelContent()
  {
    //$this->setStatus(sfLogger::WARNING);
    $contenidoLista = '<ul id="debug_documentation_list" style="display: none;">
    <li>Elemento 1</li>
    <li>Elemento 2</li>
  </ul>';
 
  $toggler = $this->getToggler('debug_documentation_list', 'Muestra/oculta lista');
 
  return sprintf('<h3>Elementos de la lista %s</h3>%s',  $toggler, $contenidoLista);
  }
  
  public static function listenToLoadDebugWebPanelEvent(sfEvent $event)
    {
      $event->getSubject()->setPanel('documentation',new self($event->getSubject())
      );
    }
}
?>
