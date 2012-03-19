<?php

class MusicController extends Bones_Controller_Default {

    public function init() {
        parent::init();
        $this->set_meta_description("Listen or download all the Bones &amp; Comfort works: Albums, Compilation and other suff");
        $this->view->left_side = $this->get_latest_shows() . $this->get_latest_news() . $this->get_twitter_stream(); //. $this->get_bandcamp_player();
    }

    public function indexAction() {
        // action body
    }

    public function mothersheepAction(){
        $this->_helper->layout->setLayout('popin');
    }
}

