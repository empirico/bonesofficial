<?php

class Admin_AlbumController extends Bones_Controller_Admin {
    const PER_PAGE = 10;

    public function indexAction() {
        $galleryId = $this->getRequest()->getParam('galleryId') ? $this->getRequest()->getParam('galleryId') : null;
        $query = AlbumQuery::create();
        if ($galleryId) {
            $query->filterByGalleryId($galleryId);
            $this->view->galleryId = $galleryId;
        }

        $this->view->album_list = $query->find();
    }

    public function photosAction() {

        $this->view->album = AlbumPeer::retrieveByPK($this->getRequest()->getParam('albumId'));
        $this->view->photo_list = $this->view->album->getPhotoss();
    }

    public function editAction() {

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

    public function newAction() {
        $this->view->album = new Album();
        $this->view->gallery = GalleryPeer::retrieveByPK($this->getRequest()->getParam('galleryId'));
    }

    public function errorAction() {

    }

    public function saveAction() {

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
        switch ($action) {

            case 'SAVE': {

                    $album->setTitle($params['title']);
                    $album->setTitleSlug(Bones_Utils_Filter::slug_me($params['title']));
                    $album->setDescription($params['description']);
                    $album->setGalleryId($params['galleryId']);
                    $album->setIsPublic($params['is_public']);
                    $album->setMaxHeight($params['max_height']);
                    $album->setMaxWidth($params['max_width']);
                    $album->save();
                    $url = $this->view->url(array('action' => 'edit', 'albumId' => $album->getId()));
                }
                break;
            case 'DEL' : {
                    $album->delete();
                    $url = $this->view->url(array('action' => 'index', 'galleryId' => $params['galleryId']));
                }
                break;
            case 'ADDPHOTO': {
                    if (!empty($_FILES['photo']['name'])) {

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

                            foreach ($uploader->getErrorMessages() as $msg) {
                                $this->setErrorMessage($msg);
                            }
                        }
                    } else {
                        $this->setErrorMessage('Non hai caricato nessun file!');
                    }

                    if ($album->getId() > 0) {
                        $url = $this->view->url(array('action' => 'photos', 'albumId' => $album->getId()));
                    } else {
                        $url = $this->view->url(array('action' => 'new', 'galleryId' => $params['galleryId']));
                    }
                }
                break;
        }

        $this->_redirect($url);
    }

    public function listAlbumAction() {

        $this->__checkGallery();
        $this->view->gallery = $this->gallery;
    }

    public function deletePhotoAction() {

        $aId = $this->getRequest()->getParam('albumId');
        $pId = $this->getRequest()->getParam('photoId');

        $album = AlbumPeer::retrieveByPK($aId);
        if (!($album instanceof Album )) {
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
        $url = $this->view->url(array('action' => 'photos', 'albumId' => $album->getId(), 'photoId' => null));

        $this->_redirect($url);
    }

}

