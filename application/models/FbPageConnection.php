<?php

class App_Model_FbPageConnection
{
	private $fbGraph;
	private $remoteCache;

	public function __construct() {
		
		$this->fbGraph = new Bones_Social_Facebook_Graph('bonesofficial');
		$cacheManager = Zend_Registry::get('cachemanager');
		$this->remoteCache = $cacheManager->getCache('remote');
	}
	
	public function getFeed($toArray = true) {
		
		$cacheName = __CLASS__ . $this->fbGraph->getObjectId() . 'getFeed';
		if (($feed = $this->remoteCache->load($cacheName)) === false) {
			
			$feed = $this->fbGraph->getFeed();
			$this->remoteCache->save($feed);
		
		} 
		if ($toArray) return Zend_Json_Decoder::decode($feed);
		return $feed;
		
	}
	
	public function getPosts($toArray = true) {
		
		$cacheName = __CLASS__ . $this->fbGraph->getObjectId() . 'getPosts';
		if (($feed = $this->remoteCache->load($cacheName)) === false) {
			
			$feed = $this->fbGraph->getPosts();
			$this->remoteCache->save($feed);
		
		}
		if ($toArray) return Zend_Json_Decoder::decode($feed);
		return $feed;
			
	}
	
	public function getStatuses($toArray = true) {
	
		$posts = $this->getPosts($toArray);
		$statuses = Array();
		foreach ($posts['data'] as $post) {
			if ($post['type'] == 'status') {
				$statuses[] = $post;
			}
		}
		return $statuses;
	}
	
	public function getEvents($toArray = true, $access_token){
		
		$cacheName = __CLASS__ . $this->fbGraph->getObjectId() . 'getEvents';
		if (($feed = $this->remoteCache->load($cacheName)) === false) {
			
			$feed = $this->fbGraph->getEvents($access_token);
			$this->remoteCache->save($feed);
		
		}
		if ($toArray) return Zend_Json_Decoder::decode($feed);
		return $feed;
	
	}
	
	public function getLastFbStatus(){
	
	    $fbData = Array();
	    $fbPosts = $this->getPosts(true);
		foreach ($fbPosts['data'] as $data) {
    		if ($data['type'] == 'status') return $data;
    		
    	}
    	return $fbData;
	}
	
	public function getPhotos($toArray = true){
		$cacheName = __CLASS__ . $this->fbGraph->getObjectId() . 'getPhotos';
			if (($feed = $this->remoteCache->load($cacheName)) === false) {
				$feed = $this->fbGraph->getPosts();
				$this->remoteCache->save($feed);
			}
			if ($toArray) return Zend_Json_Decoder::decode($feed); 
			return $feed;
	}
	
}

