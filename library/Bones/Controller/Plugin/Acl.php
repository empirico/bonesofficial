<?php
class Bones_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract {


    private $_acl;
    private $_roleName;
    private $_errorPage;

    public function __construct(Zend_Acl $aclData = null, $roleName = 'guest'){

        $this->_errorPage = array('module' => 'default',
                                  'controller' => 'error',
                                  'action' => 'error');
        $this->setRoleName($roleName);

        if (null !== $aclData) {
            $this->setAcl($aclData);
        }

    }

    public function setAcl(Zend_Acl $aclData){$this->_acl = $aclData;}
    public function getAcl(){return $this->_acl;}
    public function setRoleName($roleName) {$this->_roleName = $roleName;}
    public function getRoleName(){return $this->_roleName;}
    public function setErrorPage($action, $controller = 'error', $module = null) {
        $this->_errorPage = array('module' => $module,
                                  'controller' => $controller,
                                  'action' => $action);
    }
    public function getErrorPage(){return $this->_errorPage;}
    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {
    		$resourceName = '';
	        $resourceName = $request->getControllerName();
	        /** Check if the controller/action can be accessed by the current user */
	        if (!$this->getAcl()->isAllowed($this->_roleName, $resourceName, $request->getActionName())) {
	            /** Redirect to access denied page */
	        	$this->denyAccess();
	        }
    }

    public function denyAccess(){
        $this->_request->setModuleName($this->_errorPage['module']);
        $this->_request->setControllerName($this->_errorPage['controller']);
        $this->_request->setActionName($this->_errorPage['action']);
    }

}