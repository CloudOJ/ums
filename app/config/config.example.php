<?php
return new \Phalcon\Config(array(
    'site' => array(
        'name'      => '<your site name>',
        //NOTE: you still need to change site_name in i18n files.
        'url'       => 'http://ums.localhost',
        'project'   => 'Ums',
        'software'  => 'Ums',
        'repo'      => 'https://github.com/CloudOJ/ums',
        'docs'      => 'https://github.com/CloudOJ/ums/wiki',
    ),
    'database'    => array(
        'adapter'  => 'Mysql',
        'host'     => '<your sql host>',
        'username' => '<your sql username>',
        'password' => '<your sql password>',
        'dbname'   => '<your db name>',
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
            'staticBaseUri' => '//bower.localhost/',
            'baseUri'       => '/'
        ),
        'production'     => array(
            'staticBaseUri' => '/ums/static',
            'baseUri'       => '/'
        ),
        'debug'          => true,
        'crypt' => array(
            'key' => '<your cookie crypt key>'
        )
    ),
    'ums' => array(
        array(
            'id' => 1,
            'name' => 'Sekai | 世界部',
            'key' => '<your ums app key>',
            'baseUri' => '<baseUri>',
            'umsUri' =>  '<baseUri>/ums'
        )
    ),
    'recaptcha' => array(
        'enabled' => true,
        'sitekey'  => '<your nocaptcha site key>',
        'secretkey' => '<your nocaptcha secret key>'
    )
));
