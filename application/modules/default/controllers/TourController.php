<?php
class TourController extends Bones_Controller_Default
{
    const JOURNAL_ID = 2;
    const PER_PAGE = 9;

    public function init(){
        parent::init();
        $this->set_meta_description("Discover where the band will play next time. Maybe it will be on your favourite venue");
        $this->setup_sidebar(array( self::BAR_SHOWS => 3, self::BAR_NEWS => 5, self::BAR_TWITTER =>'', self::BAR_FACEBOOK =>''));
    }

	public function indexAction() {
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

        $query = JournalPostQuery::create()
                ->filterByJournalId(self::JOURNAL_ID)
                ->filterByIsPublic(1)
                ->filterByStartDate(date('Y-m-d'), Criteria::LESS_THAN)
                ->limit(10)
                ->orderByStartDate(Criteria::DESC);

        $this->view->past_events = $query->find();

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

    public function gigAction() {
        $slug = $this->getRequest()->getParam('slug');
        $this->view->post = JournalPostQuery::create()->findOneByTitleSlug($slug);
        $this->_helper->layout->setLayout('popin');

    }


}

