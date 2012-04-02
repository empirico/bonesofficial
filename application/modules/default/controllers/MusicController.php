<?php

class MusicController extends Bones_Controller_Default {

    public function init() {
        parent::init();
        $this->set_meta_description("Listen or download all the Bones &amp; Comfort works: Albums, Compilation and other suff");
        $this->setup_sidebar(array( self::BAR_NEWS => 5, self::BAR_SHOWS => 3, self::BAR_TWITTER =>'', self::BAR_FACEBOOK =>''));
    }

    public function indexAction() {
        // action body
    }

    public function mothersheepAction(){
        $this->_helper->layout->setLayout('popin');
    }
}

