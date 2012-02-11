<?php

class Bones_Controller_Base extends Zend_Controller_Action
{

	protected $_locale;
	protected $_language;
	protected $_acl;
	protected $_errorNamespace;
	protected $config;
	protected $translator;
	protected $cacheManager;


	public function init()
    {
    	parent::init();

		$this->config = Zend_Registry::get('config');
    	$this->_locale = Zend_Registry::get('locale');
    	$this->_language = $this->_locale->getLanguage();
    	$this->translator = Zend_Registry::get('translator');
    	$this->view->lang = $this->_language;
    	$this->view->translator = $this->translator;

    	$front = Zend_Controller_Front::getInstance();
    	$eh = $front->getPlugin('Zend_Controller_Plugin_ErrorHandler');

    	switch ($this->getRequest()->getModuleName()) {

    		case 'admin': {
    			$eh->setErrorHandlerModule('cpanel');
    		}
    		break;
    		default:{
    			$eh->setErrorHandlerModule('default');
    		}
    	}

    	$this->_acl = new Bones_Acl_Acl();
    }

    protected function check_permissions($auth){

    	$resourceName = $this->_request->getModuleName() . ":" . $this->_request->getControllerName();
        $role = is_null($auth->getRole()) ? 'guest' : $auth->getRole();

        /** Check if the controller/action can be accessed by the current user */
        if (!$this->_acl->isAllowed($role, $resourceName, $this->_request->getActionName())){

        	$this->_errorNamespace->error = true;
        	$this->setErrorMessage('Azione non consentita');
        	$this->redirect_to_error();
        }

    }

	protected function redirect_to_error(){
    	$this->_errorNamespace = new Zend_Session_Namespace(__CLASS__);
	    $this->_errorNamespace->error = true;
	    $this->_redirect($this->view->url(array('controller'=>'error', 'action' => 'error')));
    }

    protected function clear_error(){
    	$this->_errorNamespace = new Zend_Session_Namespace(__CLASS__);
    	Zend_Session_Namespace::resetSingleInstance(__CLASS__);
    }


    protected function setErrorMessage($message) {
    	$errorNS = new Zend_Session_Namespace(strtoupper($this->_request->getModuleName()). '_ERROR');
    	$errorNS->messages[] = $message;
    }

    protected function getErrorMessages() {
		$errorNS = new Zend_Session_Namespace(strtoupper($this->_request->getModuleName()). '_ERROR');
    	$messages = $errorNS->messages;
    	$errorNS->unsetAll();
    	return $messages;
    }

    protected function setInfoMessage($message) {
    	$infoNS = new Zend_Session_Namespace(strtoupper($this->_request->getModuleName()). '_INFO');
    	$infoNS->messages[] = $message;
    }
 	protected function getInfoMessages() {
    	$infoNS = new Zend_Session_Namespace(strtoupper($this->_request->getModuleName()). '_INFO');
    	$messages = $infoNS->messages;
    	$infoNS->unsetAll();
    	return $messages;
    }


}

