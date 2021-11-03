<?php


class Admin
{
    /**
     * @param $login
     * Валидация логина
     * @return bool
     */
    public static function checkLogin($login): bool
    {
        if (strlen($login) >= 4) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $password
     * Валидаия пароля
     * @return bool
     */
    public static function checkPassword($password): bool
    {
        if (strlen($password) >= 6) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $login
     * @param $password
     * Получение пользователем Id
     * @return false|mixed
     */
    public static function adminId($login, $password)
    {
        $db = Db::connection();

        $sql = 'SELECT * FROM admin WHERE login = :login AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $admin = $result->fetch();
        if ($admin) {
            return $admin['id'];
        } else {
            return false;
        }
    }

    /**
     * Запись в сессию идентификатора пользователя
     * @param $adminId
     */
    public static function auth($adminId)
    {
        $_SESSION['admin'] = $adminId;
    }

    /**
     * Проверка идентифткатора пользователя
     * @return mixed|void
     */
    public static function isAuth()
    {
        if (isset($_SESSION['admin'])) {
            return $_SESSION['admin'];
        } else {
            header('Location: /admin/login');
        }
    }

    /**
     * Проверка является ли пользователь гостем
     * @return bool
     */
    public static function isGuest(): bool
    {
        //session_start();
        if (isset($_SESSION['admin'])) {
            return false;
        }
        return true;
    }

}