<?php

class IndexController extends Bones_Controller_Default {

    public function init() {
        parent::init();
        $this->view->headLink()->appendStylesheet('/css/home.css');
        $this->view->body_class = "home";
        $this->view->left_side = $this->get_latest_shows();
        $this->view->is_home = true;
    }

    public function indexAction() {
        $album = AlbumQuery::create()->filterByTitle('home')->findOne();
        if ($album instanceof Album) {
            $this->view->width = ($album->getMaxWidth()) ? $album->getMaxWidth() : Bones_Files_Image::THUMB_WIDTH;
            $this->view->photos = $album->getPhotoss();
        }
        $news_journal = JournalPeer::retrieveByPK(1);
        $news = $news_journal->getLatestPublicPost(4);
        $news = (array)$news;
        $this->view->first_news = array_shift($news);
        $this->view->news = $news;

    }

}

