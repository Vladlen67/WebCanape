<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
/**
 * Абсолютный путь до папки ресурсов
 */
const PATH = '//Webcanape/admin/template/';
define('ROOT', dirname(__FILE__));
include_once ROOT . '/../components/Autoload.php';

$router = new Router();
$router->run();