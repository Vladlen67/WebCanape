<?php

spl_autoload_register(function($class)
{
    $arrayPath = [
        '/components/',
        '/models/'
    ];
    foreach ($arrayPath as $path) {
        $path =  ROOT . $path . $class . '.php';
        if (is_file($path)) {
            include_once ($path);
        }
    }
});
