<?php
//error_reporting(^E_NOTICE);
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
     realpath(APPLICATION_PATH . '/models')
)));

require_once APPLICATION_PATH . '/../public/js/fckeditor/fckeditor.php';
require_once 'propel/runtime/lib/Propel.php';

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

/* limelight defaults */
$bones = $application->getOption('bones');
Propel::init(APPLICATION_PATH . "/configs/" . $bones['database'] . ".php");

$application->bootstrap()->run();