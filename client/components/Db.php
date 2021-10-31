<?php


Class Db
{

    public static function connection(): PDO
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        return new PDO($dsn, $params['user'], $params['password'], $params['option']);
    }
}