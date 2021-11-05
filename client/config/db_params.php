<?php
/**
 * Параметры подключения к БД
 */
return [
    'host' => 'localhost',
    'dbname' => 'webcanapebase',
    'user' => 'mysql',
    'password' => 'mysql',
    'option' => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
];