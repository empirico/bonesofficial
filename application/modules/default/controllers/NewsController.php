<?php
class NewsController extends Bones_Controller_Default
{
    const PER_PAGE = 10;
    const JOURNAL_ID = 1;

    public function init() {
        parent::init();
        $this->view->left_side = $this->get_latest_shows() . $this->get_twitter_stream();
    }
	public function indexAction()
    {
        $offset = $this->getRequest()->getParam('offset', 1);
    	$query = JournalPostQuery::create()
                ->filterByJournalId(self::JOURNAL_ID)
                ->filterByIsPublic(1)
                ->orderByCreated(Criteria::DESC);

    	$pager = new PropelPager($query,'JournalPostPeer','doSelect',$offset, self::PER_PAGE);

		$this->view->pager =  $pager;
		$this->view->offset = $offset;
        $this->view->news = $pager->getResult();

    }

    public function postAction(){

        $this->view->left_side .= $this->get_latest_news(5);
        $this->view->first_news = Journal::getPostBySlug(self::JOURNAL_ID, $this->getRequest()->getParam('slug'));
        $this->view->page_title .= " - " . $this->view->first_news->getTitle();
    }




}

