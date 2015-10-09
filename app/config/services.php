<?php

use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DatabaseConnection;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Logger\Adapter\File as FileLogger;
use Phalcon\Mvc\Model\Metadata\Files as MetaDataAdapter;
use Phalcon\Mvc\Model\Metadata\Memory as MemoryMetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Cache\Backend\File as FileCache;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Cache\Frontend\None as FrontendNone;
use Phalcon\Cache\Backend\Memory as MemoryBackend;
use Phalcon\Cache\Frontend\Output as FrontendOutput;
use Phalcon\Crypt;
use Phalcon\Http\Response\Cookies;

$di->set('crypt', function () use ($config) {
    $crypt = new Crypt();
    $crypt->setKey($config->application->crypt->key);
    return $crypt;
});

$di->set(
    'url',
    function () use ($config) {
        $url = new UrlResolver();
        if (!$config->application->debug) {
            $url->setBaseUri($config->application->production->baseUri);
            $url->setStaticBaseUri($config->application->production->staticBaseUri);
        } else {
            $url->setBaseUri($config->application->development->baseUri);
            $url->setStaticBaseUri($config->application->development->staticBaseUri);
        }
        return $url;
    },
    true
);

$di->set(
    'volt',
    function ($view, $di) use ($config) {
        $volt = new Volt($view, $di);
        $volt->setOptions(
            [
                "compiledPath"      => APP_PATH . "/app/cache/volt/",
                "compiledSeparator" => "_",
                "compileAlways"     => $config->application->debug
            ]
        );
        $volt->getCompiler()->addFunction('glyphicon', function ($resolvedArgs, $exprArgs) use ($volt) {
            return '"<span class=\"glyphicon glyphicon-'. $exprArgs[0]["expr"]["value"] .'\" aria-hidden=\'true\'></span> "';
        });
        return $volt;
    },
    true
);

$di->set(
    'markdown',
    function ($view, $di) use ($config) {
        $markdown = new \Ums\MarkdownAdapter($view, $di);
        $markdown->setOptions(
            [
                "compiledPath"      => APP_PATH . "/app/cache/markdown/",
                "compiledSeparator" => "_",
                "compileAlways"     => $config->application->debug
            ]
        );
        return $markdown;
    },
    true
);

$di->set(
    'view',
    function () use ($config) {
        $view = new View();
        $view->setViewsDir($config->application->viewsDir);
        $view->registerEngines([
            ".volt" => 'volt',
            ".md" => 'markdown'
        ]);
        return $view;
    },
    true
);

$di->set(
    'db',
    function () use ($config) {
        $connection = new DatabaseConnection($config->database->toArray());
        $debug = $config->application->debug;
        if ($debug) {
            $eventsManager = new EventsManager();
            $logger = new FileLogger(APP_PATH . "/app/logs/db.log");
            $eventsManager->attach(
                'db',
                function ($event, $connection) use ($logger) {
                    if ($event->getType() == 'beforeQuery') {
                        $variables = $connection->getSQLVariables();
                        if ($variables) {
                            $logger->log($connection->getSQLStatement() . ' [' . join(',', $variables) . ']', \Phalcon\Logger::INFO);
                        } else {
                            $logger->log($connection->getSQLStatement(), \Phalcon\Logger::INFO);
                        }
                    }
                }
            );
            $connection->setEventsManager($eventsManager);
        }
        return $connection;
    }
);

$di->set(
    'modelsMetadata',
    function () use ($config) {
        if ($config->application->debug) {
            return new MemoryMetaDataAdapter();
        }
        return new MetaDataAdapter(['metaDataDir' => APP_PATH . '/app/cache/metaData/']);
    },
    true
);

$di->set(
    'session',
    function () {
        $session = new SessionAdapter(array(
            'uniqueId' => 'ums'
        ));
        $session->start();
        return $session;
    },
    true
);

$di->set(
    'router',
    function () {
        return include APP_PATH . "/app/config/routes.php";
    },
    true
);

$di->set(
    'config',
    function() use ($config) {
        if (!$config->application->debug) {
            $config["application"]["baseUri"] = $config->application->production->baseUri;
            $config["application"]["staticBaseUri"] = $config->application->production->staticBaseUri;
        } else {
            $config["application"]["baseUri"] = $config->application->development->baseUri;
            $config["application"]["staticBaseUri"] = $config->application->development->staticBaseUri;
        }
        return $config;
    },
    true
);

$di->set(
    'flash',
    function () {
        $flash = new Phalcon\Flash\Session([
            'error'   => 'alert alert-danger alert-dismissible fade in',
            'success' => 'alert alert-success alert-dismissible fade in',
            'notice'  => 'alert alert-info alert-dismissible fade in',
            'warning' => 'alert alert-warning alert-dismissible fade in'
        ]);
        return $flash;
    }
);

$di->set(
    'dispatcher',
    function () {
        $dispatcher = new MvcDispatcher();
        $dispatcher->setDefaultNamespace('Ums\Controllers');
        return $dispatcher;
    },
    true
);

$di->set(
    'viewCache',
    function () use ($config) {
        if ($config->application->debug) {
            $frontCache = new FrontendNone();
            return new MemoryBackend($frontCache);
        } else {
            $frontCache = new FrontendOutput(["lifetime" => 86400 * 30]);
            return new FileCache($frontCache, [
                "cacheDir" => APP_PATH . "/app/cache/views/",
                "prefix"   => "forum-cache-"
            ]);
        }
    }
);

$di->set(
    'modelsCache',
    function () use ($config) {
        if ($config->application->debug) {
            $frontCache = new FrontendNone();
            return new MemoryBackend($frontCache);
        } else {
            $frontCache = new \Phalcon\Cache\Frontend\Data(["lifetime" => 86400 * 30]);
            return new \Phalcon\Cache\Backend\File($frontCache, [
                "cacheDir" => APP_PATH . "/app/cache/data/",
                "prefix"   => "forum-cache-data-"
            ]);
        }
    }
);

$exetime = microtime(true);

$di->set(
    'exetime',
    function() use ($exetime) {
        return number_format(microtime(true) - $exetime, 3);
    },
    true
);

$di->set(
    'navbar_element',
    function() {
        return new \Ums\NavbarElement;
    },
    true
);
