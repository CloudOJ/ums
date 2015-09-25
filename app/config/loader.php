<?php

$modelsDir      = $config->application->modelsDir;
$controllersDir = $config->application->controllersDir;
$libraryDir     = $config->application->libraryDir;
$formsDir       = $config->application->formsDir;

$loader = new \Phalcon\Loader();

$loader->registerNamespaces(
    array(
       'Ums\Models'        => $modelsDir,
       'Ums\Controllers'   => $controllersDir,
       'Ums'               => $libraryDir,
       'Ums\Forms'         => $formsDir
    )
);
$loader->register();
