<?php

class ContactsController extends Bones_Controller_Default
{

    public function init() {
        parent::init();
        $this->view->left_side = $this->get_latest_shows() . $this->get_latest_news(2) . $this->get_twitter_stream();//. $this->get_bandcamp_player();
    }

    public function indexAction()
    {
        // action body
    }


}

