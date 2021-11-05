<?php

class AdminController
{
    /**
     * Приветственная страница admin/index.php
     * @return bool
     */
    public function actionIndex(): bool
    {
        $admin = Admin::isAuth();
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

    /**
     * Страница аутентификации admin/login.php
     * @return bool|void
     */
    public function actionLogin()
    {
        if (!Admin::isGuest()) {
            header('Location: /admin');
            exit;
        }
        $login ='';
        $password = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $errors = false;

            if (!Admin::checkLogin($login)) {
                $errors[] = 'Логин не должен быть короче 4-х символов';
            }
            if (!Admin::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $adminId = Admin::adminId($login, $password);
            if (!$adminId) {
                $errors[] = 'Неверный логин и пароль';
            } else {
                Admin::auth($adminId);
                header('Location: /admin');
                exit;
            }
        }
        require_once(ROOT . '/views/admin/login.php');
        return true;
    }

    /**
     * Logout
     */
    public function actionLogout()
    {
        unset($_SESSION['admin']);
        header('Location: /');
    }
}