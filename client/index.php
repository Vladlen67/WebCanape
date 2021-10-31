<?php

//Ошибки
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Подключение файлов
define('ROOT', dirname(__FILE__));
define('PREROOT', str_replace(basename(__DIR__), '', ROOT));
include_once PREROOT . 'components/Autoload.php';

$router = new Router();
$router->run();
