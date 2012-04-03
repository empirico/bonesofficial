<?php

class MediaController extends Bones_Controller_Default
{

    public function init() {
        parent::init();
        $this->setup_sidebar(array( self::BAR_NEWS => 5, self::BAR_SHOWS => 3, self::BAR_TWITTER =>'', self::BAR_FACEBOOK =>''));
    }

    public function indexAction()
    {
        $this->view->albums = AlbumQuery::create()->filterByIsPublic(1)->filterByGalleryId(1)->limit(6)->find();
    }

    public function albumAction() {
        $slug = $this->getRequest()->getParam("slug");
        $this->view->album = new Album();
        $album = AlbumQuery::create()->findOneByTitleSlug($slug);
        if ($album instanceof Album) {
            $this->view->album = $album;
            $this->view->photo_list = $album->getPhotoss(PhotosQuery::create()->orderById(Criteria::DESC));
        }
    }


}

