<?php
class PortfolioController extends Bones_Controller_Default
{
    const DEFAULT_THUMB = 200;
    
    public function init(){
        parent::init();
       	$this->view->portfolio = GalleryQuery::create()->filterByTitle('PORTFOLIO')->findOne();
        $this->view->work_list = $this->view->portfolio->getPublicAlbums();

    }
	public function indexAction()
    {

    }

    public function workAction(){

        $slugged_index = $this->getRequest()->getParam('slug');
        $this->view->work = AlbumQuery::create()->filterBySluggedIndex($slugged_index)->findOne();
        $this->view->image_list = $this->view->work->getPhotoss();

    }


}

