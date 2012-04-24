<?php

class IndexController extends Bones_Controller_Default {

    public function init() {
        parent::init();
        $this->view->headLink()->appendStylesheet('/css/home.css');
        $this->view->body_class = "home";
        $this->setup_sidebar(array(self::BAR_SHOWS => 3, self::BAR_NEWS => 5,  self::BAR_NEWSLETTER =>'', self::BAR_TWITTER =>'', self::BAR_FACEBOOK =>''));
        $this->view->is_home = true;
    }

    public function indexAction() {

        $news_journal = JournalPeer::retrieveByPK(1);
        $this->view->first_news = $news_journal->getLatestPublicPost(1)->getCurrent();

    }

}

