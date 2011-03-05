<?php

class Bones_Controller_Default extends Bones_Controller_Base
{

	protected $_locale;
	protected $_language;
	protected $_facebookApp;

		
	public function init() {
    	parent::init();
    	
    	$this->view->headLink()->appendStylesheet('/css/bones/jquery-ui-1.8.4.custom.css');
        
    	$this->view->headScript()->appendFile('/js/jquery-1.4.2.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery-ui-1.8.4.custom.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.cycle.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.prettyPhoto.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/default.js','text/javascript');
        $this->view->headLink()->appendStylesheet('/css/style.css');
        $this->view->headLink()->appendStylesheet('/css/slider.css');
        $this->view->headLink()->appendStylesheet('/css/prettyPhoto.css');
     
        
        $this->view->docType('XHTML1_STRICT');
   
    	$this->view->error_messages = $this->getErrorMessages();
    	$this->view->info_messages = $this->getInfoMessages();
    	$this->view->latestShows = EventsPeer::getLatest();
    	//var_dump($this->_facebookApp->getApp());
    	
    	if($this->_request->isXmlHttpRequest())
		{
		  $this->_helper->layout->disableLayout();
		  $this->view->track_virtual_page = $this->view->partial("partial/analytics.phtml", array("virtual_page" => $this->view->url()));;//"/". $this->_request->getControllerName() . "/" . $this->_request->getActionName();
		}
    	
    	$this->view->right_content = $this->view->partial('partial/right_content.phtml', array('translator' => $this->translator, 'latestShows' => $this->view->latestShows));
    }
	

}

