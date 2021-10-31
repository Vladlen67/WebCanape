<?php

class CompanyController
{

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

    public function actionView($id, $list = 1): bool
    {
        $name = '';
        $message = '';

        $errors = false;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['form-name'];
            $message = $_POST['form-message'];

            if (!Company::checkName($name)) {
                $errors[] = 'Имя должно быть не менее двух символов';
            }
            if (!Company::checkMessage($message)) {
                $errors[] = 'Сообщение дожно быть от пяти символов';
            }

            if ($errors == false) {
                $result = Company::post($id, $name, $message);
            }
            header('Location: /company/' . $id);
        }

        if ($id) {
            $company = Company::getCompanyItemById($id);
            $reviews = Review::getReviews($id);
            $limit = 5 * $list;
            $countPage = count($reviews);
            require_once (ROOT . '/views/company/view.php');
        }

        return true;
    }
}