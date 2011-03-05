<?php
class Bones_Social_Facebook_Connect {

	private static $_instance;
	private $_appId;
	private $_secret;
	private $_cookie;
	private $_facebookApp;
	private $_session;
	private $_user;
	private $_userId;
	
	public static function getInstance() {
	
		if (!(self::$_instance instanceof Bones_Social_Facebook_Connect)) {
			self::$_instance = new Bones_Social_Facebook_Connect();
		}
		return self::$_instance;
	}
	
	private function __construct() {
	
		$conf = Zend_Registry::get('config');
		$this->_appId = $conf->bones->facebook->appId;
		$this->_secret = $conf->bones->facebook->secret;
		$this->_cookie = ($conf->bones->facebook->cookie == 1) ? "true" : "false" ;
		$this->_facebookApp = new Facebook(array(
			  'appId'  => $this->_appId,
			  'secret' => $this->_secret,
			  'cookie' => $this->_cookie,
			));
		$this->_session = $this->_facebookApp->getSession();
		$this->buildUser();
	}
	
	private function buildUser() {
		$auth = Bones_Auth_User::getInstance();
		if ($this->isConnected()) {
			try {
				$this->_user	= $this->_facebookApp->api('/me');
				$this->_userId	= $this->_facebookApp->getUser();
				
			} Catch (Exception $e) {
				error_log($e);
			}
			$user = Users::getByFacebookData($this->_user);
			if ($user instanceof Users) {
				$auth->setIdentity($user);
			}
		
		} else {
			$auth->clearIdentity();
		}
	}
	
	public function getSession() {
		return $this->_session;
	}
	
	public function isConnected(){
		return empty($this->_session) ? false : true;
	}
	
	public function getUserId() { return $this->_userId;}
	
	public function getUser() { return $this->_user; }
	
	public function getLoginUrl(){
		return $this->_facebookApp->getLoginUrl();
	}
	public function getLogoutUrl(){
	  	return $this->_facebookApp->getLogoutUrl();
	}

	public function getScript() {
	
		$endcoded_session = ($this->isConnected()) ? json_encode($this->_session) : 'null';
		$locale = Zend_Registry::get('locale');
		$cookie = ($this->_cookie) ? "true" : "false";
		$script =<<<FBS
	     window.fbAsyncInit = function() {
		        FB.init({
		          appId   : '$this->_appId',
		          session : $endcoded_session, // don't refetch the session when PHP already has it
		          status  : true, // check login status
		          cookie  : $cookie, // enable cookies to allow the server to access the session
		          xfbml   : true // parse XFBML
		        });
		
		        // whenever the user logs in, we refresh the page
		       FB.Event.subscribe('auth.login', function() {
		          window.location.reload();
		        	});
		 	 };
		  (function() {
	        var e = document.createElement('script');
	        e.src = document.location.protocol + '//connect.facebook.net/$locale/all.js';
	        e.async = true;
	        document.getElementById('fb-root').appendChild(e);
	        
	      }());
      
FBS;
	return $script;
	}
	
	public function getLoginButton($js = true) {
		if ($js) {
			return "<fb:login-button perms=\"email,user_birthday,user_location,user_hometown,publish_stream\"></fb:login-button>";
		} else {
			$loginurl = $this->getLoginUrl();
		 	return "<a href='$loginurl'><img src='http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif'></a>";
		}
	}
	
	public function getLogoutButton() {
		$logoutUrl = $this->getLogoutUrl();
	 	return "<a href='$logoutUrl'><img src='http://static.ak.fbcdn.net/rsrc.php/z2Y31/hash/cxrz4k7j.gif'></a>";
	}
	
	public function getApp(){
	
		return $this->_facebookApp;
	}

}
