<?php

/**
 * Управление компаниями
 */
class AdminCompanyController extends AdminSecure
{
    /**
     * Список компаний передается в adminCompany/index.php
     * @return bool
     */
    public static function actionIndex(): bool
    {
        self::checkIsAuth();
        $companies = array();
        $companies = AdminCompany::getCompany();
        require_once(ROOT . '/views/adminCompany/index.php');
        return true;
    }

    /**
     * @param $id
     * Страница удаления компании adminCompany/delete.php
     * @return bool
     */
    public static function actionDelete($id): bool
    {
        self::checkIsAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            AdminReview::deleteReviewByCompany($id);
            AdminCompany::deleteCompanyById($id);
            header('Location: /admin/company');
        }
        require_once(ROOT . '/views/adminCompany/delete.php');
        return true;
    }

    /**
     * @param $id
     * Страница внесения изменений для компании adminCompany/update.php
     * @return bool
     */
    public static function actionUpdate($id): bool
    {
        self::checkIsAuth();
        $company = AdminCompany::getCompanyItemById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];
            $data['img'] = $_POST['img'] ?? '';

            if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                $data['img'] = AdminCompany::loadImage();
            }
            if (AdminCompany::updateCompanyById($id, $data)) {
                header('Location: /admin/company');
            }

        }
        require_once(ROOT . '/views/adminCompany/update.php');
        return true;
    }

    /**
     * Страница создания новой компании adminCompany/create.php
     * @return bool
     */
    public static function actionCreate(): bool
    {
        self::checkIsAuth();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = false;

            $data['title'] = $_POST['title'];
            $data['description'] = $_POST['description'];

            if (!isset($data['title']) || empty($data['title'])) {
                $errors[] = 'Необходимо заполнить название компании';
            }
            if (is_uploaded_file($_FILES['img']['tmp_name'])) {
                $data['img'] = AdminCompany::loadImage();
                if (!$data['img']) {
                    $errors[] = 'Загрузите файл с изображением в формате .jpeg или .png';
                }
            }
            if ($errors == false) {
                $id = AdminCompany::createCompany($data);
            }
            if ($id) {
                header('Location: /admin/company');
            }
        }
        require_once(ROOT . '/views/adminCompany/create.php');
        return true;
    }

}