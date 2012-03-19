<?php

class MediaController extends Bones_Controller_Default
{

    public function init() {
        parent::init();
         $this->view->left_side = $this->get_latest_shows() . $this->get_latest_news() . $this->get_twitter_stream();//. $this->get_bandcamp_player();
    }

    public function indexAction()
    {
        $this->view->albums = AlbumQuery::create()->filterByIsPublic(1)->filterByGalleryId(2)->limit(6)->find();
    }

    public function albumAction() {
        $slug = $this->getRequest()->getParam("slug");
        $this->view->album = new Album();
        $album = AlbumQuery::create()->findOneByTitleSlug($slug);
        if ($album instanceof Album) {
            $this->view->album = $album;
            $this->view->photo_list = $album->getPhotoss();
        }
    }


}

