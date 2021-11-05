<?php

return array(
    'admin/company/create' => 'adminCompany/create',
    'admin/company/delete/([0-9]+)' => 'adminCompany/delete/$1',
    'admin/company/update/([0-9]+)' => 'adminCompany/update/$1',
    '^admin/company$' => 'adminCompany/index',

    'admin/review/create' => 'adminReview/create',
    'admin/review/delete/([0-9]+)' => 'adminReview/delete/$1',
    'admin/review/update/([0-9]+)' => 'adminReview/update/$1',
    '^admin/review$' => 'adminReview/index',

    'admin/error' => 'admin/error',
    'admin/login' => 'admin/login',
    'admin/logout' => 'admin/logout',
    '^admin$' => 'admin/index',

);
