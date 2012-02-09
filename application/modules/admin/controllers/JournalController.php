<?php

class Admin_JournalController extends Bones_Controller_Admin {
    const PER_PAGE = 10;

    private function __checkJournal() {

        if (!isset($this->_errorNamespace->error)) {
            $journal_id = $this->getRequest()->getParam('journal_id');
            if (empty($journal_id)) {
                $this->setErrorMessage('Identificativo diario non valido');
                $this->redirect_to_error();
                return;
            }
            $this->journal = JournalPeer::retrieveByPK($journal_id);
            if (!($this->journal instanceof Journal)) {

                $this->setErrorMessage('Diario non valido');
                $this->redirect_to_error();
                return;
            }
        }
    }

    public function init() {
        parent::init();
        $this->offset = $this->getRequest()->getParam('offset', 1);
    }

    public function indexAction() {

        $query = JournalQuery::create();
        $pager = new PropelPager($query, 'JournalPeer', 'doSelect', $this->offset, self::PER_PAGE);

        $this->view->pager = $pager;
        $this->view->offset = $this->offset;
        $this->view->journals = $pager->getResult();
    }

    public function showAction() {
        $this->__checkJournal();
        $this->view->journal = $this->journal;

        $query = JournalPostQuery::create()->filterByJournalId($this->journal->getId());
        switch ($this->getRequest()->getParam('ord_by')) {
            default:
                $query->orderById(Criteria::DESC);
                break;
        }
        $pager = new PropelPager($query, 'JournalPostPeer', 'doSelect', $this->offset, self::PER_PAGE);
        $this->view->pager = $pager;
        $this->view->offset = $this->offset;
        $this->view->post_list = $pager->getResult();
    }

    public function editAction() {

        $this->__checkJournal();
        $this->view->journal = $this->journal;
        $this->view->journal = $journal_id ? JournalQuery::create()->findOneById($journal_id) : new Journal();
    }

    public function saveAction() {
        $post_data = $this->getRequest()->getPost();
        $journal = (!empty($post_data['journal_id'])) ? JournalQuery::create()->findOneById($post_data['journal_id']) : new Journal();
        $journal->setTitle($post_data['title']);
        $journal->setTitleSlug(Bones_Utils_Filter::slug_me($post_data['title']));
        $journal->setTextAbstract($post_data['text_abstract']);
        $journal->save();
        $this->_redirect($this->view->url(array('action' => 'index')));
    }

    public function editPostAction() {
        $this->__checkJournal();
        $this->view->journal = $this->journal;
        $this->post = JournalPostPeer::retrieveByPK($this->getRequest()->getParam('postId'));
        $this->view->post = ($this->post) ? $this->post : new JournalPost();
    }

    public function savePostAction() {
        $this->__checkJournal();
        $params = $this->getRequest()->getPost();
        $auth = Bones_Auth_Admin::getInstance();
        $action = is_array($params['submit']) ? current(array_keys($params['submit'])) : null;
        if (is_null($action)) {
            $this->setErrorMessage('Azione non valida');
            $this->redirect_to_error();
        }
        $this->journal = JournalPeer::retrieveByPK($params['journal_id']);
        if (!($this->journal instanceof Journal)) {
            $this->setErrorMessage('Diario non definito');
            $this->redirect_to_error();
        }
        $pId = $params['post_id'];

        $this->post = ($pId > 0) ? JournalPostPeer::retrieveByPK($pId) : new JournalPost();

        if ($this->post->getId() < 1) {
            $this->post->setCreated(date('Y-m-d H:i:s'));
            $this->post->setCreatorUserId($auth->getId());
            $max_post_rank = JournalPostQuery::create()->filterByJournal($this->journal)->addDescendingOrderByColumn(JournalPostPeer::RANK)->findOne();
            $rank = ($max_post_rank instanceof JournalPost) ? $max_post_rank->getRank() : 0;
            $rank++;
            $this->post->setRank($rank);
        }
        $this->post->setEdited(date('Y-m-d H:i:s'));
        $this->post->setEditorUserId($auth->getId());
        switch ($action) {

            case 'DEL' : {
                    $this->post->delete();
                    $this->_redirect($this->view->url(array('action' => 'show', 'journal_id' => $this->journal->getId())));
                    return;
                }
                break;
        }

        $this->post->setJournal($this->journal);
        $this->post->setTitle($params['title']);
        $this->post->setTitleSlug(Bones_Utils_Filter::slug_me($params['title']));
        $this->post->setTextAbstract($params['text_abstract']);
        $this->post->setContent($params['content']);

        $this->post->setIsPublic($params['is_public']);
        $start_date = empty($params['start_date']) ? date('Y-m-d H:i:s') : $params['start_date'];
        $this->post->setStartDate($start_date);

        $rank = empty($rank) ? 1 : $rank++;
        $this->post->setRank($rank);
        $this->post->save();

        if ($this->journal->getShowFileUpload()) {

            if (!empty($_FILES['post_file_upload']['name'])) {

                switch ($_POST['file_type']) {

                    case JournalPost::FILE_DOC : {
                            $uploader = new Bones_Files_Doc();
                        }
                        break;
                    case JournalPost::FILE_IMG : {
                            $uploader = new Bones_Files_Image();
                        }
                        break;
                }
                try {
                    $uploader->uploadfile();
                    $this->post->setFileType($_POST['file_type']);
                    $this->post->setFileId($uploader->getId());
                    $this->post->save();
                } catch (Bones_Files_Exception $e) {

                    foreach ($uploader->getErrorMessages() as $msg) {
                        $this->setErrorMessage($msg);
                    }

                    if ($this->post->getId() > 0) {
                        $url = $this->view->url(array('action' => 'edit-post', 'postId' => $this->post->getId()));
                    } else {
                        $url = $this->view->url(array('action' => 'new-post'));
                    }
                    $this->_redirect($url);
                    return;
                }
            }

            $this->_redirect($this->view->url(array('action' => 'show', 'journal_id' => $this->journal->getId())));
        }
    }
}