<?php

spl_autoload_register(function($class)
{
    $arrayPath = [
        '/components/',
        '/client/models/'
    ];
    foreach ($arrayPath as $path) {
        $path =  PREROOT . $path . $class . '.php';
        if (is_file($path)) {
            include_once ($path);
        }
    }
});
