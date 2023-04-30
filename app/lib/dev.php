<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Позволяет наглядно продебажжить переменную. Инструмент разработчика.
function debug($str)
{
    echo '<pre>';
    var_dump($str);
    echo  '</pre>';
}