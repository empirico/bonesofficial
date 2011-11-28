<?php
class AboutController extends Bones_Controller_Default
{
	public function indexAction()
    {
        $image_list = array();

        $photo_list = PhotosQuery::create()->limit(100)->find();
        $photo_list = $photo_list->getArrayCopy();
        shuffle($photo_list);
        $i = 0;
        foreach($photo_list as $photo) {
            if ( $i > 5 ) break;
            //$photo = new Photos();
            $image_list[] = $photo;
            $i++;
        }
        $this->view->image_list = $image_list;

    }






}

