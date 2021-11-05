<?php

/**
 * Класс для работы с данными companies
 */
class AdminCompany
{
    /**
     * Список компаний
     * @return array
     */
    public static function getCompany(): array
    {
        $db = Db::connection();
        $result = $db->query('SELECT * '
            . 'FROM companies '
            . 'ORDER BY id ');

        $companies = array();

        foreach ($result as $key => $row) {
            $companies[$key] = $row;
        }
        return $companies;
    }
    /**
     * Общее количество компаний
     */
    public static function getTotalCompanies()
    {
        $db = Db::connection();
        $result = $db->query('SELECT count(id) AS count FROM companies');
        $result = $result->fetch();
        return $result['count'];
    }

    /**
     * @param $id
     * Получение компании по $id
     * @return mixed
     */
    public static function getCompanyItemById($id)
    {
        $db = Db::connection();
        if ($id) {
            $result = $db->query('SELECT * '
                . 'FROM companies '
                . 'WHERE id=' . $id);
            $company = $result->fetch();
        } else {
            return false;
        }
        return $company;
    }

    /**
     * @param $id
     * Удаление записи из таблицы companies по id
     * @return bool
     */
    public static function deleteCompanyById($id): bool
    {
        $db = Db::connection();
        $sql = 'DELETE FROM companies WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param $data
     * Добавление данных в таблицу companies
     * @return false|string
     */
    public static function createCompany($data)
    {
        $db = Db::connection();

        $sql = 'INSERT INTO companies '
            . '(title, logo, description) '
            . 'VALUES '
            . '(:title, :logo, :description)';
        $result = $db->prepare($sql);

        $result->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $result->bindParam(':logo', $data['img'], PDO::PARAM_STR);
        $result->bindParam(':description', $data['description'], PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        } else {
            return false;
        }
    }
    /**
     * Перемещение загруженного изображения в админской части, false  в случае неудачи
     * @return false|string
     */
    public static function loadImage()
    {
        $file = $_FILES['img']['tmp_name'];
        $type = ['image/jpg', 'image/jpeg', 'image/png'];
        $file_type = mime_content_type($file);
        if (!in_array($file_type, $type)) {
            return false;
        } else {
            switch ($file_type) {
                case $type[0]:
                    $img = uniqid() . '.jpg';
                    break;
                case $type[1]:
                    $img = uniqid() . '.jpeg';
                    break;
                case $type[2]:
                    $img = uniqid() . '.png';
                    break;
            }
            return move_uploaded_file($file, ROOT . '/../client/template/uploads/' . $img) ? $img : false ;
        }

    }

    /**
     * @param $id
     * @param $data
     * Обновление данных таблицы companies
     * @return bool
     */
    public static function updateCompanyById($id, $data): bool
    {
        $db = Db::connection();
        $sql = 'UPDATE companies SET '
            . 'title = :title, '
            . 'logo = :logo, '
            . 'description = :description '
            . 'WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $result->bindParam(':description', $data['description'], PDO::PARAM_STR);
        $result->bindParam(':logo', $data['img'], PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param $id
     * Выдает ссылку на загруженное изображение компании, либо на заглушку, при его отсутствии
     * @return string
     */
    public static function getImageCompany($id): string
    {
        $db = Db::connection();
        $result = $db->query('SELECT logo FROM companies WHERE id = '. $id);
        $result = $result->fetch();
        if ($result['logo']) {
            return '//Webcanape/template/uploads/' . $result['logo'];
        }
        return '//Webcanape/template/images/no-image.png';
    }
}