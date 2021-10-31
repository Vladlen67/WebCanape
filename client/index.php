<?php

//Ошибки
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Подключение файлов
define('ROOT', dirname(__FILE__));
include_once ROOT . '/components/Autoload.php';

$router = new Router();
$router->run();
