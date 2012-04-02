<?php

class BiographyController extends Bones_Controller_Default
{

    public function init() {
        parent::init();
        $this->set_meta_description("This is the story about how the guys met each others and how Bones &amp; Comfort was Born. Past, present and future.");
        $this->setup_sidebar(array(self::BAR_SHOWS => 3, self::BAR_NEWS => 5, self::BAR_TWITTER =>'', self::BAR_FACEBOOK =>''));
    }

    public function indexAction()
    {
        // action body

    }


}

