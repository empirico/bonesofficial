<?php

class Admin_IndexController extends Bones_Controller_Admin
{

    public function indexAction()
    {
        $this->view->journals = JournalQuery::create()->limit(3)->orderById(Criteria::DESC)->find();
        $this->view->posts = JournalPostQuery::create()->orderByCreated(Criteria::DESC)->limit(5)->find();
        $this->view->galleries = GalleryQuery::create()->orderById(Criteria::DESC)->limit(3)->find();
        $this->view->albums = AlbumQuery::create()->orderById(Criteria::DESC)->limit(3)->find();
        $this->view->photos = PhotosQuery::create()->orderById(Criteria::DESC)->limit(3)->find();
    }

    public function errorAction(){

    }





}

