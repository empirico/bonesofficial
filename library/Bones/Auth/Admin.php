<?php
class Bones_Auth_Admin extends Bones_Auth_Base{

    protected $admin;

	private function __construct(){
		return $this;
	}

	public static function getInstance(){

		$ns = new Zend_Session_Namespace(__CLASS__);

		if (!($ns->instance instanceof Bones_Auth_Admin)) {
			$ns->instance = new Bones_Auth_Admin();
		}
		return $ns->instance;

	}


	public function setIdentity($identity){
		$this->admin = $identity;
    }

	public function getAdmin(){
        return $this->admin;
	}
	public function getId(){
		if (!$this->admin) return false;
		$this->id = $this->admin->getId();
	 	return $this->id;
	}

	public function getUsername(){
		if (!$this->admin) return false;
		$this->username = $this->admin->getUsername();
	}

	public function getRole(){
		if (!($this->admin) instanceof Admins) return null;
		$this->role = $this->admin->getAclRoles()->getName();
		return $this->role;
	}
	
	public function getRoleId(){
	
	}

	public function clearIdentity(){
		unset($this->admin);
		$ns = new Zend_Session_Namespace(__CLASS__);
		$ns->unsetAll();
	}



}