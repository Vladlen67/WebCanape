<?php

class AdminReview
{
    /**
     * @param $id
     * Удаление отзывов по id
     * @return bool
     */
    public static function deleteReviewById($id): bool
    {
        $db = Db::connection();
        $sql = 'DELETE FROM reviews WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param $id
     * Удаление отзывов у компании
     * @return bool
     */
    public static function deleteReviewByCompany($id): bool
    {
        $db = Db::connection();
        $sql = 'DELETE FROM reviews WHERE company_id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Выводит все отзывы
     * @return array
     */
    public static function getReviews(): array
    {
        $db = Db::connection();
        $result = $db->query('SELECT * '
            . 'FROM reviews '
            . 'ORDER BY id DESC');

        $reviews = array();
        foreach ($result as $key => $row) {
            $reviews[$key] = $row;
        }
        return $reviews;
    }

    /**
     * @param $id
     * Получение информации по id отзыва
     * @return false|mixed
     */
    public static function getReviewById($id)
    {
        $db = Db::connection();
        if ($id) {
            $result = $db->query('SELECT * '
                . 'FROM reviews '
                . 'WHERE id = ' . $id);
            $review = $result->fetch();
        } else {
            return false;
        }
    return $review;
    }

    public static function updateReviewById($id, $data): bool
    {
        $db = Db::connection();
        $sql = 'UPDATE reviews SET '
            . 'author = :author, '
            . 'img = :img, '
            . 'review = :review, '
            . 'company_id = :company_id '
            . 'WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':author', $data['author'], PDO::PARAM_STR);
        $result->bindParam(':review', $data['review'], PDO::PARAM_STR);
        $result->bindParam(':img', $data['img'], PDO::PARAM_STR);
        $result->bindParam(':company_id', $data['company_id'], PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param $id
     * Выдает ссылку на загруженное лого автора отзыва, либо на заглушку, при его отсутствии
     * @return string
     */
    public static function getImageReview($id): string
    {
        $db = Db::connection();
        $result = $db->query('SELECT img FROM reviews WHERE id = '. $id);
        $result = $result->fetch();
        if ($result['img']) {
            return '//Webcanape/template/uploads/' . $result['img'];
        }
        return '//Webcanape/template/images/person-icon.png';
    }

    /**
     * @param $data
     * Добавление данных в таблицу reviews
     * @return false|string
     */
    public static function createReview($data)
    {
        $db = Db::connection();

        $sql = 'INSERT INTO reviews '
            . '(author, `img`, review, company_id) '
            . 'VALUES '
            . '(:author, :img, :review, :company_id)';
        $result = $db->prepare($sql);

        $result->bindParam(':author', $data['author'], PDO::PARAM_STR);
        $result->bindParam(':img', $data['img'], PDO::PARAM_STR);
        $result->bindParam(':review', $data['review'], PDO::PARAM_STR);
        $result->bindParam(':company_id', $data['company_id'], PDO::PARAM_INT);
        if ($result->execute()) {
            return $db->lastInsertId();
        } else {
            return false;
        }
    }
}