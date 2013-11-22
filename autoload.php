<?php
/**
 * Autoload file that needs to be laoded to use the Report
 */

if (!defined('REPORT_ROOT')) {
    define('REPORT_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
}

spl_autoload_register('autoload');

function autoload($class)
{
	if ( class_exists($class,FALSE) ) {
		//    Already loaded
		return FALSE;
	}
	
	if ( file_exists(REPORT_ROOT.$class.'.php') )
	{
		require(REPORT_ROOT.$class.'.php');
	}
	
	return false;
}