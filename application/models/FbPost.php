<?php
class App_Model_FbPost {

	private $_data;
	
	public function __construct($data = array()) {
	
		$this->_data = $data;
	
	}
	
	public function getFromName() {
		return @$this->_data['from']['name'];
	}
	public function getPicture() {
		return @$this->_data['picture'];
	}
	public function getIcon(){
		return @$this->_data['icon'];
	}
	public function getLink(){
		return @$this->_data['link'];
	}
	public function getName(){
		return @$this->_data['name'];
	}
	public function getCaption(){
		return @$this->_data['caption'];
	}
	public function getMessage() {
		return @$this->_data['message'];
	}

	public function getCreated(){
		return @$this->_data['created_time'];
	}
	
	




}