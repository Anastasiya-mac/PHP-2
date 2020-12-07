<?php

return [
    'root_dir' => realpath(__DIR__ . '/../') . "/",
    'views_dir' => realpath(__DIR__ . '/../') . "/views/",
    'vendor_dir' => realpath(__DIR__ . '/../') . "/vendor/",
    'default_controller' => 'product',
    'controller_namespace' => 'controllers\\',
    'components' => [
        'request' => ['class' => base\Request::class],
        'session' => ['class' => base\Session::class],
        'renderer' => ['class' => services\Render::class],
        'db' => [
            'class' => services\Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'root',
            'password' => '',
            'database' => 'GB_DB_PHP',
            'charset' => 'utf8',
        ]
    ]

];