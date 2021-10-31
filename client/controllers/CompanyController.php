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
        if ($id) {
            $company = Company::getCompanyItemById($id);
            $reviews = Review::getReviews($id);
            require_once (ROOT . '/views/company/view.php');
        }

        return true;
    }
}