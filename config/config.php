<?php 
// Check if HTTPS is set
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

// Get the root URL
$rootUrl = $protocol . '://' . $_SERVER['HTTP_HOST'].'/GradingSystem';

echo $rootUrl;

session_start();

define('APPNAME', 'Grading System');
define('URLROOT', 'http://'.$_SERVER['HTTP_HOST'].'/GradingSystem-main')

?>