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





}

