<?php

class Bones_Controller_Default extends Bones_Controller_Base
{

	protected $_locale;
	protected $_language;


	public function init() {
    	parent::init();

    	$this->view->headLink()->appendStylesheet('/css/bones/jquery-ui-1.8.4.custom.css');

    	$this->view->headScript()->appendFile('/js/jquery-1.6.2.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery-ui-1.8.16.custom.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.cycle.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.prettyPhoto.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/default.js','text/javascript');
        $this->view->headLink()->appendStylesheet('/css/style.css');
        
        $this->view->docType('XHTML1_STRICT');

    	$this->view->error_messages = $this->getErrorMessages();
    }


}

