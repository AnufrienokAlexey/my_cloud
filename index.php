<?php

session_start();

use app\core\Router;

require 'app/lib/dev.php';

spl_autoload_register(function ($class)
{
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});

$obj = new Router();
$obj->run();
