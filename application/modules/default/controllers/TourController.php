<?php
class TourController extends Bones_Controller_Default
{
    const JOURNAL_ID = 2;
    const PER_PAGE = 10;

    public function init(){
        parent::init();
        $this->view->left_side = $this->get_latest_news() . $this->get_latest_shows() . $this->get_twitter_stream();
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




}

