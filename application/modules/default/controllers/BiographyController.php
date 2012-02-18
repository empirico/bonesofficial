<?php

class BiographyController extends Bones_Controller_Default
{

    public function init() {
        parent::init();
        $this->view->left_side = $this->get_latest_shows() . $this->get_latest_news(). $this->get_twitter_stream();;
    }

    public function indexAction()
    {
        // action body

    }


}

