<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Logger\Adapter\File as Logger;

error_reporting(E_ALL);

if (!isset($_GET['_url'])) {
    $_GET['_url'] = '/';
}

$debug = new \Phalcon\Debug();
$debug->listen();

define('APP_PATH', realpath('..'));

require APP_PATH . "/vendor/autoload.php";

$di = new FactoryDefault();

$config = include APP_PATH . "/app/config/config.php";
require APP_PATH . "/app/config/loader.php";
require APP_PATH . "/app/config/services.php";

$application = new Application($di);

echo $application->handle()->getContent();
