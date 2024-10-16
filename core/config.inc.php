<?php
/* CMS ERRORS */
define('DISPLAY_DEBUG', true);

/* DEFAULT TIMEZONE */
define("TIMEZONE", "Europe/Warsaw");

/* CMS BASE URL */
define("BASE", 'https://' . $_SERVER['HTTP_HOST']);

/* CMS DATABASE PARAMS */
define('DB_HOST', '23113.m.tld.pl');
define('DB_NAME', 'baza23113_crm');
define('DB_USERNAME', 'admin23113_crm');
define('DB_PASSWORD', 'w0O}b8R{e5');
define('DB_CHARSET', 'utf8');
define('DB_SOCKET', '');
define('DB_PORT', '3306');
define('DB_PREFIX', 'cms_');

/* CMS SESSION PARAMS */
define("COOKIE_EXPIRE", 60 * 60 * 24 * 30);
define("COOKIE_PATH", "/");
define("COOKIE_DOMAIN", ".maxsoft.pl");
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