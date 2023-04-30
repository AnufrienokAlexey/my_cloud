<?php

namespace app\core;

class View
{
    public string $path;
    public array $route;
    public string $layout = 'default';

    // Присваиваем значения свойствам обьекта
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

    // Функция отображения страницы (соединение шаблона и контента)
    public function render($title, $vars = [])
    {
        extract($vars);
        $path = 'app/views/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start(); //Включаем буфер вывода
            require 'app/views/'.$this->path.'.php';
            $content = ob_get_clean(); // Получаем, очищаем и отключаем буфер вывода
            require 'app/views/layouts/'.$this->layout.'.php';
        }
    }

    // Функция перенаправления на другой url
    public function redirect($url)
    {
        header('Location: '.$url);
        exit;
    }

    // В случае отсутствия url в routes.php выводим страницу 404
    public static function errorCode($code) {
        http_response_code($code);
        $path = 'app/views/errors/'.$code.'.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }
}