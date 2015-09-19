<?php
return new \Phalcon\Config(array(
    'site' => array(
        'name'      => 'CloudOJ',
        'url'       => 'http://localhost/oj',
        'project'   => 'CloudOJ',
        'software'  => 'CloudOJ',
        'repo'      => 'https://github.com/CloudOJ/CloudOJ',
        'docs'      => 'https://github.com/CloudOJ/CloudOJ/wiki',
    ),
    'database'    => array(
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => '',
        'password' => '',
        'dbname'   => '',
        'charset'  => 'utf8'
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'development'    => array(
            'staticBaseUri' => '/oj/static',
            'baseUri'       => '/'
        ),
        'production'     => array(
            'staticBaseUri' => '/oj/static',
            'baseUri'       => '/'
        ),
        'debug'          => true
    )
));
