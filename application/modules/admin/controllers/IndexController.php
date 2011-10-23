<?php

class Admin_IndexController extends Bones_Controller_Admin
{

    public function init(){
        parent::init();
        $this->view->selected_page = 'home';
    }

    public function indexAction()
    {

    }

    public function errorAction(){

    }

    /*
    protected function _checkLogin(){
        $auth = Bones_Auth_Admin::getInstance();
        if (!$auth->getId()) {
    		$this->_redirect($this->config->bones->admin->loginurl);
    	} else {
    		$this->view->logged = true;
    		$this->_auth = $auth;
            return true;
    	}
        return false;
    }
     * 
     */

}

