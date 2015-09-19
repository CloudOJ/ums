<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Phalcon\Logger\Adapter\File as Logger;

error_reporting(E_ALL);

if (!isset($_GET['_url'])) {
    $_GET['_url'] = '/';
}

define('APP_PATH', realpath('..'));



try {
    $di = new FactoryDefault();

    $config = include APP_PATH . "/app/config/config.php";
    require APP_PATH . "/app/config/loader.php";
    require APP_PATH . "/app/config/services.php";

    $application = new Application($di);

    echo $application->handle()->getContent();
} catch (Exception $e) {
    echo $e->getMessage();
    
    $logger = new Logger(APP_PATH . '/app/logs/error.log');
    $logger->error($e->getMessage());
    $logger->error($e->getTraceAsString());
    $response = new Response();
    //$response->redirect('/505.html');
    $response->send();
}
