<?php

/**
 * home actions.
 *
 * @package    lynx
 * @subpackage home
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
    if(!$this->getUser()->hasCredential('admin_true')){
        
      //$this->redirect('@default_index?module=licitacoe');
    }
  }
}
