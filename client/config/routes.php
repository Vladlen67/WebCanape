<?php

return array(
    'review/([0-9]+)' => 'review/index/$1',
    'page-([0-9]+)' => 'company/index/$1',
    '([0-9]+)' => 'company/view/$1',
    'error' => 'company/error',
    '/' => 'company/index',

);
