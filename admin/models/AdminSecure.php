<?php

/**
 * Клас содержащий общую логику проверки доступа
 */
abstract class AdminSecure
{
    /**
     * Проверка авторизации
     * @return bool|void
     */
    public static function checkIsAuth()
    {
        if (Admin::isAuth()) {
            return true;
        }
        die('Access denied');
    }
}