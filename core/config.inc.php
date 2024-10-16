<?php
/* CMS ERRORS */
define('DISPLAY_DEBUG', true);

/* DEFAULT TIMEZONE */
define("TIMEZONE", "Europe/Warsaw");

/* CMS BASE URL */
define("BASE", 'https://' . $_SERVER['HTTP_HOST']);

/* CMS DATABASE PARAMS */
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USERNAME', '');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8');
define('DB_SOCKET', '');
define('DB_PORT', '');
define('DB_PREFIX', 'cms_');

/* CMS SESSION PARAMS */
define("COOKIE_EXPIRE", 60 * 60 * 24 * 30);
define("COOKIE_PATH", "/");
define("COOKIE_DOMAIN", "");
define('SESSION_NAME', 'CRM');
define('GC_MAXLIFETIME', '3440');

/* FILEPATHS */
define("CUSTOMERSFILESPATH",  "/upload/customer/");

/* Additional */
define("DEFAULT_EMAIL", "");

if(DISPLAY_DEBUG){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}
else
error_reporting(0);
?>