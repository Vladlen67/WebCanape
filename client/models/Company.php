<?php


class Company
{
    public static function getCompanyItemById($id)
    {
        $db = Db::connection();

        if ($id) {
            $company_result = $db->query('SELECT * '
                . 'FROM companies '
                . 'WHERE id=' . $id);
            $company = $company_result->fetch();
        }
        return $company;
    }

    public static function getCompany($offset, $limit): array
    {
        $db = Db::connection();
        $result = $db->query('SELECT companies.id, title, logo, description, COUNT(reviews.id) AS reviews '
        . 'FROM companies '
        . 'LEFT JOIN reviews '
        . 'ON reviews.company_id = companies.id '
        . 'GROUP BY companies.id '
        . 'ORDER BY title '
        . 'LIMIT ' . $limit . ' '
        . 'OFFSET ' . $offset);

        $companies = array();

        foreach ($result as $key => $row) {
            $companies[$key] = $row;
        }

        return $companies;
    }

    public static function getTotalCompanies()
    {
        $db = Db::connection();
        $result = $db->query('SELECT count(id) AS count FROM companies');
        $result = $result->fetch();
        return $result['count'];
    }
}