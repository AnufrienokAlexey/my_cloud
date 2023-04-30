<?php

namespace app\core;

class Router
{
    /* Массив маршрутов из routes.php, например:
    ["#^main/contact$#"]=>
    array(2) {
        ["controller"]=>
        string(4) "main"
        ["action"]=>
        string(7) "contact"
    }
    */
    protected array $routes = [];

    /* Массив параметров маршрута текущего url, например:
    array(2) {
        ["controller"]=>
        string(4) "main"
        ["action"]=>
        string(7) "contact"
    }
    */
    protected array $params = [];

    // Создаем массив маршрутов из файла
    public function __construct()
    {
        $routes = require 'app/config/routes.php';
        foreach ($routes as $key => $value) {
            $this->add($key, $value);
        }
    }

    // Добавляем символы паттерна для preg_match
    public function add($route, $params)
    {
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;
    }

    // Ищем совпадение текущего url с таблицей маршрутов в routes.php
    public function match(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    // Создаем объект контроллера, если action есть у контроллера и url есть в таблице
    public function run()
    {
        if($this->match()) {
            $path = 'app\controllers\\'.ucfirst($this->params['controller']).'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}