<?php
return new \Phalcon\Config(array(
    'site' => array(
        'name'      => 'Ums',
        'url'       => 'http://localhost/ums',
        'project'   => 'Ums',
        'software'  => 'Ums',
        'repo'      => 'https://github.com/CloudOJ/ums',
        'docs'      => 'https://github.com/CloudOJ/ums/wiki',
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
        'formsDir'       => APP_PATH . '/app/forms/',
        'development'    => array(
            'staticBaseUri' => '/ums/static',
            'baseUri'       => '/'
        ),
        'production'     => array(
            'staticBaseUri' => '/ums/static',
            'baseUri'       => '/'
        ),
        'debug'          => true
    )
));
