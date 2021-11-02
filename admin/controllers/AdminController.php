<?php

class AdminController
{
    public function actionIndex()
    {
        require_once(ROOT . '/views/admin/index.php');


    }

    public function actionError()
    {
        require_once(ROOT . '/views/admin/error.php');
    }

    public function actionLogin()
    {

        $login ='';
        $password = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_SERVER['login'];
            $password = $_SERVER['password'];
            $error = false;

            if (!Admin::checkLogin($login)) {
                $error[] = 'Логин не должен быть короче 4-х символов';
            }
            if (!Admin::checkPassword($password)) {
                $error[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $adminId = Admin::adminId($login, $password);
            if (!$adminId) {
                $error[] = 'Неверный логин и пароль';
            } else {
                Admin::auth($adminId);
            }
            header('Location: /admin');
        }
        require_once(ROOT . '/views/admin/login.php');
    }
}