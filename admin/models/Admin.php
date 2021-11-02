<?php


class Admin
{
    public static function checkLogin($login): bool
    {
        if (strlen($login) >= 4) {
            return true;
        } else {
            return false;
        }
    }

    public static function checkPassword($password): bool
    {
        if (strlen($password) >= 6) {
            return true;
        } else {
            return false;
        }
    }

    public static function adminId($login, $password)
    {
        $db = Db::connection();

        $sql = 'SELECT * FROM admin WHERE login = :login AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        $admin = $result->fetch();
        if ($admin) {
            return $admin['id'];
        } else {
            return false;
        }
    }

    public static function auth($adminId)
    {
        session_start();
        $_SESSION['admin'] = $adminId;
    }

    public static function isGuest(): bool
    {
        if (isset($_SESSION['admin'])) {
            return false;
        }
        return true;
    }

}