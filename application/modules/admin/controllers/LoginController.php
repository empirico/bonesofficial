<?php

class Admin_LoginController extends Bones_Controller_Base
{

	protected $_config;

    public function init()
    {
    	parent::init();

     	$this->config = Zend_Registry::get('config');
     	$this->view->doctype('XHTML1_STRICT');
       	$this->view->headLink()->appendStylesheet('/css/admin.css');
        $this->view->headLink()->appendStylesheet('/css/theundir/jquery-ui-1.8.4.custom.css');
        $this->view->headScript()->appendFile('/js/jquery-1.4.2.min.js', $type = 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery-ui-1.8.4.custom.min.js', $type = 'text/javascript');

    }

    public function indexAction()
    {
        $this->view->error_messages = $this->getErrorMessages();
    }

    public function logoutAction()
    {
    	$auth = Bones_Auth_Admin::getInstance();
    	$auth->clearIdentity();
    	$this->_redirect($this->config->bones->admin->loginurl);

    }

    public function dologinAction()
    {
        $username = $this->getRequest()->getParam('username');
        $password = $this->getRequest()->getParam('password');

         if (empty($username) || empty($password)){
        	$this->setErrorMessage('username e password vuoti');
        	$this->_redirect($this->config->bones->admin->loginurl);
        }

        $C = new Criteria();
        $C->add(AdminsPeer::USERNAME, $username);
        $C->add(AdminsPeer::PASSWORD, $password);
        $admin = AdminsPeer::doSelectOne($C);



        if ($admin instanceof Admins){

        	$auth = Bones_Auth_Admin::getInstance();
        	$auth->setIdentity($admin);
			$this->_redirect($this->view->url(array('controller'=>'index', 'action' => 'index')));

        } else {
       		$this->setErrorMessage('Invalid username and password');
        	$this->_redirect($this->config->bones->admin->loginurl);
        }

    }


}







