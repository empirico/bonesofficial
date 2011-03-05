<?php
class DownloadController extends Bones_Controller_Default
{
	public function indexAction()
    {
    	
   
			header("Location: /infatwetrust/BonesAndComfort_in_Fat_we_trust_2009.zip");
    }
    
    public function ifwtAction(){
    
    	$this->_helper->layout->disableLayout();
    	$this->_helper->viewRenderer->setNoRender();
    	
    	$tracking = new FilesTracker();
    	$tracking->setRefererUrl($_SERVER['HTTP_REFERER']);
    	$tracking->setIpAddess($_SERVER['REMOTE_ADDR']);
    	$tracking->setFilename('BonesAndComfort_in_Fat_we_trust_2009.zip');
    	$tracking->setDownloadedTime(date("Y-m-d H:i:s"));
    	$tracking->save();
		header("Location: /infatwetrust/BonesAndComfort_in_Fat_we_trust_2009.zip");
		return;
    
    }


}

