<?php
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions());
        Zend_Registry::set('config', $config);
        return $config;
    }

	protected function _initAppAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
	        'namespace' => 'App',
	        'basePath' => dirname(__FILE__),
	    ));
	    return $autoloader;
	}

	protected function _initLayoutHelper()
	{
	    $this->bootstrap('frontController');
	    $layout = Zend_Controller_Action_HelperBroker::addHelper(
	        new Bones_Controller_Action_Helper_LayoutLoader());
	}

	protected function _initRoutes(){
		$controller = Zend_Controller_Front::getInstance();
        $configs = Zend_Registry::get('config');
        $router =   $controller->getRouter();
        $router->addConfig($configs, 'routes');

    }

	protected function _initSession(){
		Zend_Session::start();
	}

	protected function _initLocale(){

		$front = Zend_Controller_Front::getInstance();
		$front->registerPlugin(new Bones_Controller_Plugin_Multilanguage());
		
	}
	
	public function _initAcl(){
		
	}
	
	public function _initCache() {
		$this->bootstrap('cachemanager');
		$cacheManager = $this->getResource('cachemanager');
		Zend_Registry::set("cachemanager", $cacheManager);
		
	}
}


