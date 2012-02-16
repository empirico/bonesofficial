<?php

class IndexController extends Bones_Controller_Default {

    public function init() {
        parent::init();
        $this->view->headLink()->appendStylesheet('/css/home.css');
        $this->view->body_class = "home";
        $this->view->left_side = $this->get_latest_shows() . $this->get_latest_news(2) ;//. $this->get_bandcamp_player();
        $this->view->is_home = true;
    }

    public function indexAction() {

        $news_journal = JournalPeer::retrieveByPK(1);
        $this->view->first_news = $news_journal->getLatestPublicPost(1)->getCurrent();

    }

}

