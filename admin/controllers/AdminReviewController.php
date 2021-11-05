<?php

/**
 * Управление отзывами
 */
class AdminReviewController extends AdminSecure
{
    /**
     * Страница управления отзывами adminReview/index.php
     * @return bool
     */
    public static function actionIndex(): bool
    {
        self::checkIsAuth();
        $reviews = array();
        $reviews = AdminReview::getReviews();
        require_once(ROOT . '/views/adminReview/index.php');
        return true;
    }

    /**
     * @param $id
     * Страница удаления отзыва adminReview/delete.php
     * @return bool
     */
    public static function actionDelete($id): bool
    {
        self::checkIsAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            AdminReview::deleteReviewById($id);
            header('Location: /admin/review');
        }
        require_once(ROOT . '/views/adminReview/delete.php');
        return true;
    }

    /**
     * Страница создания нового отзыва adminReview/create.php
     * @return bool
     */
    public static function actionCreate(): bool
    {
        self::checkIsAuth();
        $companies = AdminCompany::getCompany();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = false;
            $data['author'] = $_POST['author'];
            $data['review'] = $_POST['review'];
            $data['company_id'] = $_POST['company_id'];

            if (!isset($data['author']) || empty($data['author'])) {
                $errors[] = 'Необходимо ввести имя';
            }if (!isset($data['review']) || empty($data['review'])) {
                $errors[] = 'Необходимо оставить отзыв';
            }
            if (!isset($data['company_id']) || empty($data['company_id'])) {
                $errors[] = 'Необходимо выбрать к какой компании отзыв относится';
            }
            if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                $data['img'] = AdminCompany::loadImage();
                if (!$data['img']) {
                    $errors[] = 'Загрузите файл с изображением в формате .jpeg или .png';
                }
            }
            if ($errors == false) {
                $id = AdminReview::createReview($data);
            }
            if ($id) {
                header('Location: /admin/review');
            } else echo 'Не получилось';
        }
        require_once(ROOT . '/views/adminReview/create.php');
        return true;
    }

    /**
     * @param $id
     * Страница внесения изменений для отзыва adminReview/update.php
     * @return bool
     */
    public static function actionUpdate($id): bool
    {
        self::checkIsAuth();
        $review = AdminReview::getReviewById($id);
        $companies = AdminCompany::getCompany();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data['author'] = $_POST['author'];
            $data['review'] = $_POST['review'];
            $data['img'] = $_POST['img'] ?? '';
            $data['company_id'] = $_POST['company_id'];

            if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                $data['img'] = AdminCompany::loadImage();
            }
            if (AdminReview::updateReviewById($id, $data)) {
                header('Location: /admin/review');
            }

        }
        require_once(ROOT . '/views/adminReview/update.php');
        return true;
    }

}