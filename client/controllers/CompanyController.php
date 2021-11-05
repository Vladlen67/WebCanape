<?php

class CompanyController
{
    /**
     * @param int $page
     * Список компаний передается в company/index.php с пагинацией
     * @return bool
     */
    public function actionIndex($page = 1): bool
    {
        $companies = array();
        $limit = 5;
        $offset = ($page - 1) * $limit;
        $companies = Company::getCompany($offset, $limit);
        $total = Company::getTotalCompanies();
        $countPage = intval($total / $limit);

        require_once (ROOT . '/views/company/index.php');

        return true;
    }

    /**
     * @param $id
     * Детальная страница компании company/view.php
     * @return bool
     */
    public function actionView($id): bool
    {
        $name = '';
        $message = '';

        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $message = $_POST['message'];
                $errors = false;
                if (!Company::checkName($name)) {
                    $errors[] = 'Имя должно быть не менее двух символов';
                }
                if (!Company::checkMessage($message)) {
                    $errors[] = 'Сообщение дожно быть от пяти символов';
                }
                if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                    $img = Company::loadImage();
                    if (!$img) {
                        $errors[] = 'Загрузите файл с изображением в формате .jpeg или .png';
                    }
                }
                if ($errors == false) {
                    $result = Company::postReview($id, $name, $message, $img);
                    header('Location: /' . $id);
                }
            }
            $company = Company::getCompanyItemById($id) ?? false;
            if (!$company) {
                header('Location: /error');
            }
            $reviews = Review::getReviews($id);
            require_once (ROOT . '/views/company/view.php');
        }
        return true;
    }

    /**
     * Страница ошибки company/error.php
     * @return bool
     */
    public static function actionError(): bool
    {
        require_once (ROOT . '/views/company/error.php');
        return true;
    }
}