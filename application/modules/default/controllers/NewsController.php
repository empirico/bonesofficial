<?php
class NewsController extends Bones_Controller_Default
{
    const PER_PAGE = 5;
    const JOURNAL_ID = 1;

    public function init() {
        parent::init();
        $this->set_meta_description("Stay tuned with Bones &amp; comfort: read the news about the band. ");
        $this->view->left_side = $this->get_latest_shows() . $this->get_twitter_stream();
    }
	public function indexAction() {
        $offset = $this->getRequest()->getParam('offset', 1);
    	$query = JournalPostQuery::create()
                ->filterByJournalId(self::JOURNAL_ID)
                ->filterByIsPublic(1)
                ->orderByStartDate(Criteria::DESC);

    	$pager = new PropelPager($query,'JournalPostPeer','doSelect',$offset, self::PER_PAGE);

		$this->view->pager =  $pager;
		$this->view->offset = $offset;
        $this->view->news = $pager->getResult();
    }

    public function postAction(){

        $this->view->left_side = $this->get_latest_shows() . $this->get_latest_news(5) . $this->get_twitter_stream();
        $this->view->first_news = Journal::getPostBySlug(self::JOURNAL_ID, $this->getRequest()->getParam('slug'));
        $this->view->page_title .= " - " . $this->view->first_news->getTitle();

        $description = $this->view->first_news->getAbstractFromContent(500);
        $description_slices = explode(".", $description);
        $this->set_meta_description($description_slices);
    }




}

