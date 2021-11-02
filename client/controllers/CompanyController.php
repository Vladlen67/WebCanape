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

    public function actionView($id): bool
    {
        $name = '';
        $message = '';

        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['form-name'];
                $message = $_POST['form-message'];
                $errors = false;
                if (!Company::checkName($name)) {
                    $errors[] = 'Имя должно быть не менее двух символов';
                }
                if (!Company::checkMessage($message)) {
                    $errors[] = 'Сообщение дожно быть от пяти символов';
                }
                if ($errors == false) {
                    $result = Company::post($id, $name, $message);
                }
            }
            $company = Company::getCompanyItemById($id) ?? false;
            if (!$company) {
                header('Location: /error');
            }
            $reviews = Review::getReviews($id);
            $countPage = count($reviews);
            require_once (ROOT . '/views/company/view.php');
        }
        return true;
    }

    public function actionError(): bool
    {
        require_once (ROOT . '/views/company/error.php');
        return true;
    }
}