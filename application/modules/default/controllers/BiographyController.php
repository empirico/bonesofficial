<?php

class BiographyController extends Bones_Controller_Default
{

    public function init() {
        parent::init();
        $this->set_meta_description("This is the story about how the guys met each others and how Bones &amp; Comfort was Born. Past, present and future.");
        $this->view->left_side = $this->get_latest_shows() . $this->get_latest_news(). $this->get_twitter_stream();;
    }

    public function indexAction()
    {
        // action body

    }


}

