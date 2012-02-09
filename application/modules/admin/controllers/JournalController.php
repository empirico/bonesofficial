<?php

class Admin_JournalController extends Bones_Controller_Admin {
    const PER_PAGE = 10;

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

    }

    public function editAction() {
        $journalId = $this->getRequest()->getParam('journal_id');
        $this->view->journal = $journalId ? JournalQuery::create()->findOneById($journalId) : new Journal();
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

    public function editPost() {

    }

    public function savePsost() {

    }

}

