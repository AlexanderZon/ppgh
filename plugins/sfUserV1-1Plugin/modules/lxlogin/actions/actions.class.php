<?php

/**
 * lxlogin actions.
 *
 * @package    lynx4
 * @subpackage lxlogin
 * @author     Henry Vallenilla <henryvallenilla@gmail.com>
 */
class lxloginActions extends sfActions
{
    /**
     * Preexecute
     */
    public function preExecute ()
    {
        $this->setLayout('layoutLogin');
        //echo md5('cori2013');
    }
    /**
     * Index Login
     * @param sfWebRequest $request
     */
    public function executeIndex(sfWebRequest $request)
    {
        
        ////Si esta autentificado ingresa al sistema
        $this->redirectIf($this->getUser()->isAuthenticated(),'@default_index?module=home');
        /*if(!$request->getParameter('user')){
            return sfView::SUCCESS;
            
        }
        if(!$this->getUser()->isAuthenticated()){
            if($request->getParameter('user') !='logout'){
               $this->redirect('@default?module=lxlogin&action=index&user=logout');
            }else{
               $this->getResponse()->setHttpHeader('Location', '/');
            }
        }
        */
        $this->frmLogin = new LoginForm();
        
        if ($request->isMethod('post'))
        {
            $this->frmLogin->bind($request->getParameter('wdLogin'));
            if ($this->frmLogin->isValid())
            {
              $this->executeLogin();
            }
        }
    }

    /**
     * Login User
     *
     */
    public function executeLogin()
    {
        //Asigna los datos del usuario a variable de sesion
        
        $this->getUser()->setAttribute('idUserPanel', $this->frmLogin->dataUser->getIdUser());
        $this->getUser()->setAttribute('idProfile',$this->frmLogin->dataUser->getIdProfile());
        $this->getUser()->setAttribute('loginUser', $this->frmLogin->dataUser->getLogin());
        $this->getUser()->setAttribute('nameUser',$this->frmLogin->dataUser->getName());
        $this->getUser()->setAttribute('emailUser',$this->frmLogin->dataUser->getEmail());
        $this->getUser()->setAttribute('idPais', 13);
        //Agrega la credencial de administrador
        if($this->frmLogin->dataUser->getIdUser()==1) {
            $this->getUser()->addCredential('admin_lynx');
        }
        //consulta las credencial
        $credentials = LxProfileModulePeer::getCredencialUser($this->frmLogin->dataUser->getIdProfile());
        if($credentials) {
            foreach ($credentials as $credential) {
                //Asigna las credenciales
                //echo $credential['credential']."<br>";
                $this->getUser()->addCredential($credential['credential']);
            }
            
            //Autentica al usuario
            $this->getUser()->setAuthenticated(true);
            $this->redirect('@homepage');
        }else {
            ///En caso de no existir credenciales no logea al usuario
            $this->getUser()->setFlash('msn_error', $this->getContext()->getI18N()->__('You do not have privileges to access the system'));
            $this->redirect('@homepage');
        }
    }
/**
 * Cierra la sesion del usuario
 *
 */
public function executeClose() {
    //Elimina todas las credenciales
    $this->getUser()->clearCredentials();
    // Culmina la sesion del usuario
    $this->getUser()->getAttributeHolder()->clear();
    // Desactiva la autenticacion del usuario
    $this->getUser()->setAuthenticated(false);
    // Direcciona al login
    $this->redirect('@default_index?module=lxlogin');
}
public function executeChangeLanguage(sfWebRequest $request) {
     if ($request->getParameter('idi') and ($request->getParameter('idi')=='es' or $request->getParameter('idi') =='en')) {
       
        $this->getUser()->setCulture($request->getParameter('idi'));
        $this->redirect('@homepage');
    }
}
}
