<?php
class IndexController extends Bones_Controller_Default
{
    public function init() {
        parent::init();
        $this->view->shows_breadcrums = false;

    }
	public function indexAction()
    {
    	$album = AlbumQuery::create()->filterByTitle('home')->findOne();
    	if ($album instanceof Album) {
    		$this->view->width = ($album->getMaxWidth()) ? $album->getMaxWidth() : Bones_Files_Image::THUMB_WIDTH;
    		$this->view->photos = $album->getPhotoss();
    	}
    }


}

