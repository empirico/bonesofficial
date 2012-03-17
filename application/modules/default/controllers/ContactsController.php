<?php

class ContactsController extends Bones_Controller_Default
{

    public function init() {
        parent::init();
        $this->set_meta_description("Feel free to contact us using the email addresses below, or find our profiles on the most important social networks!");
        $this->view->left_side = $this->get_latest_shows() . $this->get_latest_news() . $this->get_twitter_stream();//. $this->get_bandcamp_player();
    }

    public function indexAction()
    {
        // action body
    }


}

