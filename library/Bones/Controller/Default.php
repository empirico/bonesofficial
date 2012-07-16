<?php

class Bones_Controller_Default extends Bones_Controller_Base {

    protected $_locale;
    protected $_language;
    protected $_facebookApp;
    const DESC_LIMIT = 30;
    const BAR_SHOWS = "SHOWS";
    const BAR_NEWS = "NEWS";
    const BAR_BANDCAMP = "BANDCAMP";
    const BAR_TWITTER = "TWITTER";
    const BAR_FACEBOOK = "FACEBOOK";
    const BAR_VIDEO = "VIDEO";

    public function init() {
        parent::init();
        $this->prepare_html_header();
        $this->view->controller_name = $this->getRequest()->getControllerName();
        $this->view->body_class = "generic";
        $this->view->docType('XHTML1_STRICT');

        $this->view->error_messages = $this->getErrorMessages();
        $this->view->info_messages = $this->getInfoMessages();
        $this->view->latestShows = EventsPeer::getLatest();
        //var_dump($this->_facebookApp->getApp());

        if ($this->_request->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
            $this->view->track_virtual_page = $this->view->partial("partial/analytics.phtml", array("virtual_page" => $this->view->url()));
            ; //"/". $this->_request->getControllerName() . "/" . $this->_request->getActionName();
        }
    }

    public function get_latest_shows($number = 3) {
        $items = JournalPostQuery::create()
                ->filterByJournalId(2)
                ->filterByIsPublic(1)
                ->filterByStartDate(date('Y-m-d'), Criteria::GREATER_EQUAL)
                ->limit($number)
                ->orderByStartDate(Criteria::ASC)->find();
        return $this->view->partial("partial/shows_left_box.phtml", array("posts" => $items));
    }

    public function get_latest_news($items = 3) {
        $news_journal = JournalPeer::retrieveByPK(1);
        $items = $news_journal->getLatestPublicPost($items);

        return $this->view->partial("partial/news_left_box.phtml", array("posts" => $items));
    }

    public function get_bandcamp_player() {
        return $this->view->partial("partial/band_camp_player.phtml");
    }

    public function get_twitter_stream() {
        return $this->view->partial("/partial/twitter_stream.phtml");
    }

    public function get_facebook_box(){
        return $this->view->partial("/partial/fb_fanbox.phtml");
    }

    public function get_video_box(){
        return $this->view->partial("/partial/video_box.phtml");
    }

    protected function prepare_html_header() {

        $this->view->headLink()->appendStylesheet('/css/bones/jquery-ui-1.8.4.custom.css');
        $this->view->headScript()->appendFile('http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.prettyPhoto.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/shadowbox.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.uniform.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.masonry.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/default.js', 'text/javascript');
        $this->view->headMeta()->appendName('keywords', 'Bones & Comfort, Music, Biography, Pictures, In Fat we Trust, Luca Romanò, Daniele Murroni, Alberto Trentanni');
        $this->view->headLink()->appendStylesheet("http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700&subset=latin-ext");
        $this->view->headLink()->appendStylesheet('/css/style.css');
        $this->view->headLink()->appendStylesheet('/css/prettyPhoto.css');
        $this->view->headLink()->appendStylesheet('/css/shadowbox/shadowbox.css');
        $this->view->page_title = ucfirst(strtolower(str_replace("Controller", "", get_class($this))));
        $this->set_meta_description();
    }

    protected function set_meta_description($content = "") {
        $meta_description  = "";
        if (is_array($content)) {
            foreach ($content as $sentence) {
                $sentence_stripped = trim($sentence);
                $meta_description .= "$sentence_stripped. ";
                if (str_word_count($meta_description) > self::DESC_LIMIT) break;
            }
        } else { $meta_description = $content;}
        $this->view->meta_description = $meta_description;
    }

    protected function setup_sidebar($items = array()) {
        $sidebar = "";
        foreach($items as $item=>$value) {
            switch($item){
                case self::BAR_BANDCAMP:
                    $sidebar .= $this->get_bandcamp_player();
                    break;
                case self::BAR_FACEBOOK:
                    $sidebar .= $this->get_facebook_box();
                    break;
                case self::BAR_NEWS:
                    $sidebar .= $this->get_latest_news($value);
                    break;
                case self::BAR_SHOWS:
                    $sidebar .= $this->get_latest_shows($value);
                    break;
                case self::BAR_TWITTER:
                    $sidebar .= $this->get_twitter_stream();
                    break;
                case self::BAR_VIDEO:
                    $sidebar .= $this->get_video_box();
                    break;
            }
        }
        $this->view->left_side = $sidebar;
    }
}

