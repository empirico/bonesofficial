<?php
class Bones_Controller_Plugin_Multilanguage extends Zend_Controller_Plugin_Abstract {

	public function preDispatch(Zend_Controller_Request_Abstract $request) {
	
		$language = $this->_request->getParam('lang');
		switch($language) {
		
			case 'en': {
				$locale = new Zend_Locale('en_US');
			}
			break;
			case 'it':
			default: {
				$locale = new Zend_Locale('it_IT');
				
			}
		
		
		}
		$translator = new Zend_Translate(
		    array(
		        'adapter' => 'ini',
		        'content' => APPLICATION_PATH . '/../resources/i18n/' . $locale->getLanguage() . '/translation.ini',
		        'locale'  => $locale->getLanguage()
		    )
		);
		
		Zend_Registry::set('locale', $locale);
		Zend_Registry::set('translator', $translator);
		Zend_Date::setLocale($locale);
		
		$this->_request->setParam('lang',$locale->getLanguage());
				
		
		
	
	}



}