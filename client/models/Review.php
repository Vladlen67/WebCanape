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
        $reviews_result = $db->query('SELECT * '
            . 'FROM reviews '
            . 'WHERE company_id =' . $id);

        $reviews = array();
        foreach ($reviews_result as $key => $row) {
            $reviews[$key] = $row;
        }
        return $reviews;
    }

}