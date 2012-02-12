<?php
class TourController extends Bones_Controller_Default
{
    public function init(){
        parent::init();
        $this->view->left_side = $this->get_latest_news() . $this->get_latest_shows();
    }
    
	public function indexAction()
    {

    }




}

