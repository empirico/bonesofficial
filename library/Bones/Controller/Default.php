<?php

class Bones_Controller_Default extends Bones_Controller_Base {

    protected $_locale;
    protected $_language;
    protected $_facebookApp;
    const DESC_LIMIT = 30;

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

    public function get_latest_shows($items = 3) {
        $shows_journal = JournalPeer::retrieveByPK(2);
        $items = $shows_journal->getLatestPublicPost($items);
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

    protected function prepare_html_header() {

        $this->view->headLink()->appendStylesheet('/css/bones/jquery-ui-1.8.4.custom.css');
        $this->view->headScript()->appendFile('http://cdn.jquerytools.org/1.2.6/full/jquery.tools.min.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/jquery.prettyPhoto.js', 'text/javascript');
        $this->view->headScript()->appendFile('/js/default.js', 'text/javascript');
        $this->view->headMeta()->appendName('keywords', 'Bones & Comfort, Music, Biography, Pictures, In Fat we Trust, Luca Romanò, Daniele Murroni, Alberto Trentanni');
        $this->view->headLink()->appendStylesheet("http://fonts.googleapis.com/css?family=Alegreya:400italic,400,700&subset=latin-ext");
        $this->view->headLink()->appendStylesheet('/css/style.css');
        $this->view->headLink()->appendStylesheet('/css/prettyPhoto.css');
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

}

