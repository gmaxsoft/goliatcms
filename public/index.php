<?php
ob_start();

/**  Valid PHP Version? **/
$minPHPVersion = '8.0';
if (phpversion() < $minPHPVersion)
{
	die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is " . phpversion());
}

if (file_exists("../core/init.php"))
require_once ("../core/init.php");
else
die("Error, Initialization class not found!");

$app = new app();
$app->loadController();
ob_end_flush();
?>