<?php
class Bones_Social_Facebook_Graph {

	private $fbObjectId;
	private $base_url = "graph.facebook.com/";
	
	public function __construct($fbObjectId){
	
		$this->fbObjectId  = $fbObjectId;
	}
	
	public function getFullUrl($https) {
	
		$protocol = ($https) ? 'https' : 'http';
		return $protocol . "://" . $this->base_url . $this->fbObjectId . "/";
	}
	
	public function getObjectId() {
		return $this->fbObjectId;
	}
	
	public function getFeed() {
	
		$output = $this->grabInfos('feed');
		return $output;     
	}
	
	public function getPosts() {
		$output = $this->grabInfos('posts');
		return $output;
	}
	
	public function getPhotos() {
		$output = $this->grabInfos('photos');
		return $output;
	}
	
	public function getEvents($access_token){
		if (!isset($access_token)) return "{}";
		return $this->grabInfos('events', $access_token);
	
	}
	
	private function grabInfos($info_type, $access_token = null) {
	
		$https = !is_null($access_token);
		$url = $this->getFullUrl($https) . $info_type ;
		if (!is_null($access_token)) $url .= "?access_token=" .$access_token;
		
		$ch = curl_init(); 
	    // set url 
        curl_setopt($ch, CURLOPT_URL, $url); 
        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        // $output contains the output string 
        $output = curl_exec($ch); 
        // close curl resource to free up system resources 
        curl_close($ch);
       	return $output;
	}
	


}