<?php

class ReviewController
{
    /**
     * @param $id
     * Детальная страница отзыва
     * @return bool
     */
    public function actionIndex($id): bool
    {
        if ($id) {
            $review = Review::getReview($id);
            require_once (ROOT . '/views/review/index.php');
        }
        return true;
    }

}