<?php

/**
 * error actions.
 *
 * @package    lynxcms
 * @subpackage error
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class errorActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
  }
  public function executeCredential()
  {
    if(!$this->getUser()->hasCredential('backend_activo')){
      $this->redirect('@homepage');
    }
  }
}