<?php

$modelsDir      = $config->application->modelsDir;
$controllersDir = $config->application->controllersDir;
$libraryDir     = $config->application->libraryDir;
$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
    array(
       'CloudOJ\Models'        => $modelsDir,
       'CloudOJ\Controllers'   => $controllersDir,
       'CloudOJ'               => $libraryDir
    )
);
$loader->register();
