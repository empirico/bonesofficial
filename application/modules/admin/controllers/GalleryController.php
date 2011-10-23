<?php

class Admin_GalleryController extends Bones_Controller_Admin
{
	const PER_PAGE = 10;

	private function __checkGallery() {

		if (@!$this->_errorNamespace->error) {
			$gId = $this->getRequest()->getParam('galleryId');
	        if (empty($gId)) {
	        	$this->setErrorMessage('Identificativo diario non valido');
	    		$this->redirect_to_error();
	    		return;
	        }
	        $this->gallery = GalleryPeer::retrieveByPK($gId);
	        if (!($this->gallery instanceof Gallery)){

	        	$this->setErrorMessage('Diario non valido');
	        	$this->redirect_to_error();
	    		return;
	        }
		}

	}

    public function indexAction() {
    	$offset = $this->getRequest()->getParam('offset', 1);
    	$query = GalleryQuery::create()->addAscendingOrderByColumn(GalleryPeer::ID);
    	$pager = new PropelPager($query,'GalleryPeer','doSelect',$offset, self::PER_PAGE);

		$this->view->pager =  $pager;
		$this->view->offset = $offset;
        $this->view->gallery_list = $pager->getResult();
    }

    public function editAction(){

    	$gId = $this->getRequest()->getParam('galleryId');
    	if ($gId) {
    		$this->view->gallery = GalleryPeer::retrieveByPK($gId);
    	}
    	else {
    		$this->_redirect($this->view->url(array('action' => 'new', 'galleryId'=>null)));
    	}

    }

    public function newAction() {

      $this->view->gallery = new Gallery();
    }

    public function saveAction(){

    	$params = $this->getRequest()->getPost();

    	$action = is_array($params['submit']) ? current(array_keys($params['submit'])) : null;

    	if ($params['gallery_id']) {
			$gallery = GalleryPeer::retrieveByPK($params['gallery_id']);
		} else {
			$gallery = new Gallery();
		}

    	switch ($action) {

    		case 'DEL':{
    			$gallery->delete();
    			$url = $this->view->url(array('controller' => 'gallery', 'action' => 'index'));
    		}
    		break;
    		case 'SAVE':{
    			$gallery->setTitle($params['title']);
		    	$gallery->setTitleSlug(Bones_Utils_Filter::slug_me($params['title']));
		    	$gallery->setDescription($params['description']);

		    	if ($gallery->validate()) {
				  $gallery->save();
				  $url = $this->view->url(array('controller' => 'gallery', 'action' => 'index'));
				} else {
				  foreach ($gallery->getValidationFailures() as $failure) {
				    $this->setErrorMessage($failure->getMessage());
				  }
				  $url = $this->view->url(array('controller'=>'gallery', 'action' => 'edit', 'gallery_id' => $gallery->getId()));
				}


    		}
    		break;
    		default: {
    			$this->setErrorMessage('Azione non valida');
    			$this->redirect_to_error();
    		}
  			break;
    	}

    	$this->_redirect($url);
   }

    public function errorAction(){

    }

    public function newAlbumAction() {

    	$this->__checkGallery();
    	$this->view->album = new Album();
    	$this->view->gallery = $this->gallery;


    }
}

