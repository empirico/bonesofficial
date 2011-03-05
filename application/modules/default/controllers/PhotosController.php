<?php
class PhotosController extends Bones_Controller_Default {

    public function indexAction()
    {
    	$photos = Array();
    	$width = Bones_Files_Image::THUMB_WIDTH;
    	
   		$album = AlbumQuery::create()->filterByTitle('photogallery')->findOne();
    	if ($album instanceof Album) {
    		 $width = ($album->getMaxWidth()) ? $album->getMaxWidth() : Bones_Files_Image::THUMB_WIDTH;
    		 $photos = $album->getPhotoss();
    	}
    	$this->view->width = $width;
    	$this->view->photos = (array)$photos;
    }


}

