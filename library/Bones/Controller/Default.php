<?php

class Bones_Controller_Default extends Bones_Controller_Base
{

	protected $_locale;
	protected $_language;
    protected $_breadcrumb = array();


	public function init() {
    	parent::init();
        $this->view->headScript()->appendFile('/js/jquery.prettyPhoto.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.masonry.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/default.js','text/javascript');
        $this->view->headLink()->appendStylesheet('http://fonts.googleapis.com/css?family=Lato:300');
        $this->view->headLink()->appendStylesheet('/css/prettyPhoto.css');
        $this->view->headLink()->appendStylesheet('/css/style.css');

        $this->view->docType('XHTML1_STRICT');
    	$this->view->error_messages = $this->getErrorMessages();
        $this->addBreadCrumb('weloveheart', $this->view->url(array('controller' => 'index', 'action' => 'index'), 'default', null));
        $this->addBreadCrumb($this->getRequest()->getControllerName(),$this->view->url(array('controller' => $this->getRequest()->getControllerName(), 'action' =>'index'),'default', null));
        $this->view->shows_breadcrums = true;
        $this->view->fb_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $this->view->page_title = ucfirst($this->getRequest()->getControllerName());
    }


    protected function addBreadCrumb($element, $url = null){
        $element = ($element == 'index') ? '' : $element;
        if ($element == 'show') return;
        $url = (empty($url)) ? $this->view->url(array('action'=>$element)) : $url;
        $this->_breadcrumb[] = array('name' => $element, 'url' => $url);
    }

    protected function getBreadCrumbs(){
       return $this->_breadcrumb;
    }

    public function postDispatch() {
        parent::postDispatch();
        $this->view->breadcrumbs = $this->getBreadCrumbs();
    }




}

