<?php

class Review
{
    public static function getReview($id): array
    {
        $db = Db::connection();

        if ($id) {
            $result = $db->query('SELECT * '
                . 'FROM reviews '
                . 'WHERE id=' . $id);
            $review = $result->fetch();
        }
        return $review;
    }

    public static function getReviews($id)
    {
        $db = Db::connection();
        $reviewsResult = $db->query('SELECT * '
            . 'FROM reviews '
            . 'WHERE company_id =' . $id);

        $reviews = array();
        foreach ($reviewsResult as $key => $row) {
            $reviews[$key] = $row;
        }
        return $reviews;
    }

    /**
     * @param $id
     * Выдает ссылку на загруженное лого автора комментария, либо на заглушку, при его отсутствии
     * @return string
     */
    public static function getImageReview($id): string
    {
        $db = Db::connection();
        $result = $db->query('SELECT img FROM reviews WHERE id = '. $id);
        $res = $result->fetch();
        if ($res['img']) {
            return '//Webcanape/client/template/uploads/' . $res['img'];
        }
        return '//Webcanape/client/template/images/person-icon.png';
    }

}