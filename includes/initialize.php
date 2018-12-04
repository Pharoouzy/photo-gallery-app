<?php 
	
	// Define the core paths
	// Define them as absolute paths to make sure that require_once works as expected
	
	// DIRECTORY_SEPARATOR is a PHP pre-defined constant
	// (\ for windows, / for Unix)
	defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
	defined('SITE_ROOT') ? null : define('SITE_ROOT', 'C:'.DS.'server'.DS.'htdocs'.DS.'photo_gallery');
	defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes'.DS);
	// order is important
	// load config file first
	require_once(LIB_PATH.'config.php');

	// load basic functions next so that everything after can use them
	require_once(LIB_PATH.'functions.php');

	// load core objects
	require_once(LIB_PATH.'Session.php');
	require_once(LIB_PATH.'Database.php');
	require_once(LIB_PATH.'DatabaseObject.php');
	require_once LIB_PATH.'Pagination.php';

	// load database-related classes
	require_once LIB_PATH.'User.php';
	require_once LIB_PATH.'Photograph.php';
	// echo realpath(dirname(__FILE__));

?>