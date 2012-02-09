<?php

class Admin_JournalController extends Bones_Controller_Admin {

    public function indexAction() {
        $fb = new App_Model_FbPageConnection();
        $aToken = '2227470867|2.P_S09t3lwA9JHomiyqtHKA__.3600.1297670400-574968041|UA_ma09pRoZMlPAGIfwvkuL_NWw';
        $output = $fb->getEvents(true, $aToken);

        print_r($output);
    }

}

