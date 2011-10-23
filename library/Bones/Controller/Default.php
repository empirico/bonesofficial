<?php

class Bones_Controller_Default extends Bones_Controller_Base
{

	protected $_locale;
	protected $_language;


	public function init() {
    	parent::init();
        $this->view->headScript()->appendFile('/js/jquery.cycle.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.prettyPhoto.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/default.js','text/javascript');
        $this->view->headLink()->appendStylesheet('/css/prettyPhoto.css');
        $this->view->headLink()->appendStylesheet('/css/style.css');

        $this->view->docType('XHTML1_STRICT');
    	$this->view->error_messages = $this->getErrorMessages();
    }


}

