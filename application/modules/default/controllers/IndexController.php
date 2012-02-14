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
        $news = JournalPostQuery::create()
                    ->filterByJournalId(1)
                    ->filterByIsPublic(1)
                    ->orderByCreated(Criteria::DESC)
                    ->limit(4)->find();
        $news = (array)$news;
        $this->view->first_news = array_shift($news);
        $this->view->news = $news;

    }

}

