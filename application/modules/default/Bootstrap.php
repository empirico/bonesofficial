<?php
class Default_Bootstrap extends Zend_Application_Module_Bootstrap
{
	
	protected function _initAppAutoload()
	{
		$autoloader = new Zend_Application_Module_Autoloader(array(
	        'namespace' => 'App',
	        'basePath' => APPLICATION_PATH,
	    ));

	    return $autoloader;
	}
}
