<?php


class Company
{
    public static function getCompanyItemById($id)
    {
        $db = Db::connection();

        if ($id) {
            $company_result = $db->query('SELECT * '
                . 'FROM companies '
                . 'WHERE id=' . $id . ' '
                . 'LIMIT 5');
            $company = $company_result->fetch();
        }
        return $company;
    }

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

    public static function getTotalCompanies()
    {
        $db = Db::connection();
        $result = $db->query('SELECT count(id) AS count FROM companies');
        $result = $result->fetch();
        return $result['count'];
    }

    public static function checkName($name): bool
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkMessage($message): bool
    {
        if (strlen($message) >= 5) {
            return true;
        }
        return false;
    }

    public static function post($id, $name, $message, $img = ''): bool
    {
        $db = Db::connection();

        if (is_uploaded_file($_FILES['form-img']['tmp_name'])) {
            $file = $_FILES['form-img']['tmp_name'];
            $type = ['image/jpg', 'image/jpeg', 'image/png'];
            $file_type = mime_content_type($file);
            if (!in_array($file_type, $type)) {
                $errors['file'] = 'Загрузите файл с изображением в формате .jpeg или .png';
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
                    move_uploaded_file($file, ROOT . '/template/uploads/' . $img);
                    }
            }

        $sql = 'INSERT INTO reviews (author, review, company_id, img) '
            . 'VALUES (:author, :review, :company_id, :img)';

        $result = $db->prepare($sql);
        $result->bindParam(':author', $name, PDO::PARAM_STR);
        $result->bindParam(':review', $message, PDO::PARAM_STR);
        $result->bindParam(':company_id', $id, PDO::PARAM_STR);
        $result->bindParam(':img', $img, PDO::PARAM_STR);
        return $result->execute();
    }
}