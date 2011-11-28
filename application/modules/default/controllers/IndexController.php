<?php
class IndexController extends Bones_Controller_Default
{
    public function init() {
        parent::init();
        $this->view->shows_breadcrums = false;
        $this->_helper->layout->setLayout('splash');

    }
	public function indexAction()
    {
    	
    }


}

