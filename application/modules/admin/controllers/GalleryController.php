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

    public function indexAction()
    {
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
    		$this->view->gallery = new Gallery();
    	}
     
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
    /*
 	public function editAlbumAction() {
    
    	$this->__checkGallery();
    	$album = AlbumPeer::retrieveByPK($this->getRequest()->getParam('albumId'));
    	if (!($album instanceof Album)) {
    	
    		$this->setErrorMessage("Album non valido");
    		$this->redirect_to_error();
	    	return;
    	}	
    	$this->view->album = $album;
    	
    	$gallery = $album->getGallery();
    	$this->view->gallery = $gallery;
    	$this->view->photo_list = $album->getPhotoss();
    }
    
    public function saveAlbumAction(){
    
    	$this->__checkGallery();
    	$params = $this->getRequest()->getPost();
    	$auth = Bones_Auth_Admin::getInstance();
    	$action = is_array($params['submit']) ? current(array_keys($params['submit'])) : null;
    	if (is_null($action)) {
    		$this->setErrorMessage('Azione non valida');
    		$this->redirect_to_error();	
    	}
   		if ($params['id'] > 0) {
		    		$album = AlbumPeer::retrieveByPK($params['id']);
			} else {
		    		$album = new Album();
		}
    	switch($action) {
    	
    		case 'SAVE': {
		    	
		    	$album->setTitle($params['title']);
		    	$album->setDescription($params['description']);
		    	$album->setGalleryId($params['gallery_id']);
		    	$album->setIsPublic($params['is_public']);
		    	$album->setMaxHeight($params['max_height']);
		    	$album->setMaxWidth($params['max_width']);
		    	$album->save();
		    	$url = $this->view->url(array('action'=>'edit-album', 'albumId' => $album->getId()));
    		}
    		break;
    		case 'DEL' : {
    			$album->delete();
    			$url = $this->view->url(array('action' => 'list-album', 'albumId' => null, 'galleryId' => $params['gallery_id']));
    		}
    		break;
    		case 'ADDPHOTO':{
	    		if (!empty($_FILES['photo']['name'])){
	    		
	    			$uploader = new Bones_Files_Image();
	    			try {
	    				$uploader->uploadfile();
	    				$photo = new Photos();
	    				$photo->setFileId($uploader->getId());
	    				$numphoto = $album->countPhotoss();
	    				$album->addPhotos($photo);
	    				$album->save();
	    				if ($numphoto == 0) {
	    					$album->setCoverPhotoId($photo->getId());
	    					$album->save();
	    				}
	    			} catch (Bones_Files_Exception $e) {
	    				
	    				foreach ($uploader->getErrorMessages() as $msg){
	    					$this->setErrorMessage($msg);
	    				}
					}
				} else {$this->setErrorMessage('Non hai caricato nessun file!');}
    			if ($album->getId() > 0) {
    				$url = $this->view->url(array('action' => 'edit-album', 'albumId' => $album->getId()));
    			} else {
    				$url = $this->view->url(array('action' => 'new-album'));
    			}
    		}
    		break;
    	}
    	
    	$this->_redirect($url);
    }
	
    public function listAlbumAction(){
    
    	$this->__checkGallery();
    	$this->view->gallery = $this->gallery;
    }
   
    public function deletePhotoAction(){
    
    	$aId = $this->getRequest()->getParam('albumId');
    	$pId = $this->getRequest()->getParam('photoId');
    	
    	$album = AlbumPeer::retrieveByPK($aId);
    	if (!($album instanceof Album )){
    		$this->setErrorMessage("Album non valido");
    		$this->_redirect($this->view->url(array('action' => 'index')));
    		return;
    	} 
    	
    	$photo = PhotosQuery::create()->filterByAlbumId($aId)
    	->filterById($pId)->findOne();

    	if (!($photo instanceof Photos)) {
    		$this->setErrorMessage("Foto non valida");
    		$this->_redirect($this->view->url(array('action' => 'index')));
    		return;
    	}
    	
    	$photo->delete();
    	if ($pId == $album->getCoverPhotoId()) {
    		
    		$p2 = PhotosQuery::create()->filterByAlbum($album)->filterById($pId, Criteria::NOT_EQUAL)->findOne();
    		if ($p2 instanceof Photos) {
    			$album->setCoverPhotoId($p2->getId());
    		} else {
    			$album->setCoverPhotoId(null);
    		}
    		$album->save();
    	}
    
    	if ($album->getId() > 0) {
    		$url = $this->view->url(array('action' => 'edit-album', 'albumId' => $album->getId(), 'galleryId' => $album->getGalleryId(), 'photoId' => null));
    	} else {
    		$url = $this->view->url(array('action' => 'list-album'));
    	}
    	$this->_redirect($url);
    }
     */
}

   