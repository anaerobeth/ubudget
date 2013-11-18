<?php
// TIMEZONE
date_default_timezone_set('Asia/Manila');

// APPLICATION DETAILS
define('APP_NAME', 'uBudget');
define('APP_AUTHOR', 'TEAM RANDOM');

// URL PATHS
define('APP_PATH', str_replace(DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('BASE_URL','http://localhost:10088/');
define('ASSET_URL','http://localhost:10088/assets/');

// DATABASE
define('DB_HOST', 'localhost');
define('DB_NAME', 'ubudget');
define('DB_USER', 'root');
define('DB_PASS', '');

// REDBEAN ORM
include_once('rb.php');
R::setup("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);

// HELPER LIBRARY
include_once 'helpers.php';

// SHARETHIS PUBLISHER ID
define('SHARETHIS_PUBID', '');

// SLIM MICROFRAMEWORK
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim(array(
    'templates.path' => 'views')
    );
