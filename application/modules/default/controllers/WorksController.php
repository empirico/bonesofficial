<?php
class WorksController extends Bones_Controller_Default
{
    const DEFAULT_THUMB = 200;

    public function init(){
        parent::init();
       	$this->view->portfolio = GalleryQuery::create()->filterById(1)->findOne();
        $this->view->work_list = $this->view->portfolio->getPublicAlbums();
    }

	public function indexAction()
    {

    }

    public function showAction(){

        $slugged_index = $this->getRequest()->getParam('slug');
        $this->view->work = AlbumQuery::create()->filterBySluggedIndex($slugged_index)->findOne();
        $this->view->image_list = $this->view->work->getPhotoss();
        $this->view->page_title = ucfirst($this->view->work->getTitle());
        $this->addBreadCrumb($this->view->work->getTitle());

    }


}

