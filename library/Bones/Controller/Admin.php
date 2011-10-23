<?php
class Bones_Controller_Admin extends Bones_Controller_Base
{

	private $_auth;

    public function init()
    {
    	parent::init();
    	$auth = Bones_Auth_Admin::getInstance();
    	$this->check_permissions($auth);
        $this->view->logged = false;
		$this->view->doctype('XHTML1_STRICT');

        $this->view->headScript()->prependFile($this->view->baseUrl().'/js/fckeditor/fckeditor.js?'. rand(999,99999), $type='text/javascript');
    	$this->view->headLink()->appendStylesheet('/css/admin.css');

        if ($this->_checkLogin()) {
            $this->view->main_menu = $this->getMainMenu();
        }
    	$this->view->error_messages = $this->getErrorMessages();
    	$this->view->info_messages = $this->getInfoMessages();
        $this->view->selected_page = $this->getRequest()->getControllerName();

	}

    protected function _checkLogin(){
        $auth = Bones_Auth_Admin::getInstance();
        if (!$auth->getId()) {
    		$this->setErrorMessage('La sessione è scaduta');
        	$this->_redirect($this->config->bones->admin->loginurl);
        } else {
    		$this->view->logged = true;
    		$this->_auth = $auth;
    		return true;
    	}
        return false;
    }

	protected function getMainMenu(){
		$entries = array();
		$resources = $this->_acl->getAllowedResources($this->_auth,$this->_request->getModuleName());
		$entries[] = Array('name' => 'home', 'url' => $this->view->url(array('controller'=>'index','lang' => $this->_language),'admin', 'true'));
		foreach ($resources as $res){
			$entries[] = Array('name' => $res, 'url' => $this->view->url(array('controller'=>$res, 'lang' => $this->_language),'admin', true));
		}
		$entries[] = Array('name' => 'logout', 'url' => $this->view->url(array('controller'=>'login','lang' => $this->_language, 'action'=> 'logout'),'admin', 'true'));
		return $entries;
	}


}
