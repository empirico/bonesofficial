<?php
class TourController extends Bones_Controller_Default
{
    const JOURNAL_ID = 2;
    const PER_PAGE = 5;

    public function init(){
        parent::init();
        $this->set_meta_description("Discover where the band will play next time. Maybe it will be on your favourite venue");
        $this->view->left_side = $this->get_latest_news() . $this->get_latest_shows() . $this->get_twitter_stream();
    }

	public function indexAction()
    {
        $offset = $this->getRequest()->getParam('offset', 1);
    	$query = JournalPostQuery::create()
                ->filterByJournalId(self::JOURNAL_ID)
                ->filterByIsPublic(1)
                ->filterByStartDate(date('Y-m-d'), Criteria::GREATER_EQUAL)
                ->orderByStartDate(Criteria::ASC);

    	$pager = new PropelPager($query,'JournalPostPeer','doSelect',$offset, self::PER_PAGE);

		$this->view->pager =  $pager;
		$this->view->offset = $offset;
        $this->view->news = $pager->getResult();

    }

    public function pastAction() {

        $offset = $this->getRequest()->getParam('offset', 1);
    	$query = JournalPostQuery::create()
                ->filterByJournalId(self::JOURNAL_ID)
                ->filterByIsPublic(1)
                ->filterByStartDate(date('Y-m-d'), Criteria::LESS_THAN)
                ->orderByStartDate(Criteria::DESC);

    	$pager = new PropelPager($query,'JournalPostPeer','doSelect',$offset, 20);

		$this->view->pager =  $pager;
		$this->view->offset = $offset;
        $this->view->news = $pager->getResult();
    }




}

