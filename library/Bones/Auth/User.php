<?php
class Bones_Auth_User extends Bones_Auth_Base {

    protected $user;

	private function __construct(){
		return $this;
	}

	public static function getInstance(){

		$ns = new Zend_Session_Namespace(__CLASS__);

		if (!($ns->instance instanceof Bones_Auth_User)) {
			$ns->instance = new Bones_Auth_User();
		}
		return $ns->instance;

	}


	public function setIdentity($identity){
		$this->user = $identity;
    }

	public function getUser(){
        return $this->user;
	}
	public function getId(){
		if (!$this->user) return false;
		$this->id = $this->user->getId();
	 	return $this->id;
	}

	public function getUsername(){
		if (!$this->user) return false;
		$this->username = $this->user->getNickname();
	}

	public function getRole(){
		if (!($this->user) instanceof Users) return null;
		$this->role = $this->user->getAclRoles()->getName();
		return $this->role;
	}
	public function getRoleId(){
		if (!($this->user) instanceof Users) return null;
		return $this->user->getRoleId();
	}

	public function clearIdentity(){
		unset($this->user);
		$ns = new Zend_Session_Namespace(__CLASS__);
		$ns->unsetAll();
	}



}