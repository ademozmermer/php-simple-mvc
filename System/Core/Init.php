<?php

require_once 'Constants.php';
use System\Library\Router\Router;

new \System\Core\Kernel();

// Router
$params = [
    'paths' => [
        'controllers' => config('filesystem.controllers_path'),
    ],
    'namespaces' => [
        'controllers' => config('filesystem.controllers_namespace'),
    ],
    'base_folder' => __DIR__,
    'main_method' => 'main',
];

$router = new Router($params);

require_once ROOT_DIR . DS . 'Routes/web.php';

$router->run();