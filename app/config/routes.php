<?php

use Phalcon\Mvc\Router;

$router = new Router();

$router->add("/:controller/:action/:params", array(
    'controller' => 1,
    'action'     => 2,
    'params'     => 3
));
return $router;
