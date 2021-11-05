<?php

/**
 * Класс для работы с компаниями
 */
class Company
{
    /**
     * @param $id
     * Получение информации по id компании
     * @return false|mixed
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
     * @param $offset
     * @param $limit
     * Получение списка компаний и пагинация
     * @return array
     */
    public static function getCompany($offset, $limit): array
    {
        $db = Db::connection();
        $result = $db->query('SELECT companies.id, title, logo, description, COUNT(reviews.id) AS reviews '
        . 'FROM companies '
        . 'LEFT JOIN reviews '
        . 'ON reviews.company_id = companies.id '
        . 'GROUP BY companies.id '
        . 'ORDER BY title '
        . 'LIMIT ' . $limit . ' '
        . 'OFFSET ' . $offset);

        $companies = array();

        foreach ($result as $key => $row) {
            $companies[$key] = $row;
        }

        return $companies;
    }

    /**
     * Получение колличества компаний
     * @return mixed
     */
    public static function getTotalCompanies()
    {
        $db = Db::connection();
        $result = $db->query('SELECT count(id) AS count FROM companies');
        $result = $result->fetch();
        return $result['count'];
    }

    /**
     * @param $name
     * Валидация имени
     * @return bool
     */
    public static function checkName($name): bool
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * @param $message
     * Валидация отзыва
     * @return bool
     */
    public static function checkMessage($message): bool
    {
        if (strlen($message) >= 5) {
            return true;
        }
        return false;
    }

    /**
     * Перемещение загруженного изображения, false  в случае неудачи
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
            return move_uploaded_file($file, ROOT . '/template/uploads/' . $img) ? $img : false ;
        }

    }

    /**
     * @param $id
     * @param $name
     * @param $message
     * Добавление отзыва
     * @return bool
     */
    public static function postReview($id, $name, $message, $img = ''): bool
    {
        $db = Db::connection();
        $sql = 'INSERT INTO reviews (author, review, company_id, img) '
            . 'VALUES (:author, :review, :company_id, :img)';

        $result = $db->prepare($sql);
        $result->bindParam(':author', $name, PDO::PARAM_STR);
        $result->bindParam(':review', $message, PDO::PARAM_STR);
        $result->bindParam(':company_id', $id, PDO::PARAM_STR);
        $result->bindParam(':img', $img, PDO::PARAM_STR);
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