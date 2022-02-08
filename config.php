<?php

$env = [
    'production' => [
        'db' => [
            'host' => 'localhost',
            'user' => 'dsfdsfds',
            'pass' => 'eswfsdfdsf',
            'db' => 'dapi',
        ],
        'app' => [
            'url' => 'http://website.com',
            'api' => 'http://website.com/api.php',
        ],
    ],
    'development' => [
        'db' => [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'db' => 'dapi',
        ],
        'app' => [
            'url' => 'http://localhost.com',
            'api' => 'http://localhost/api.php',
        ],
    ],
    'testing' => [
        'db' => [
            'host' => 'localhost',
            'user' => 'root',
            'pass' => '',
            'db' => 'dapi',
        ],
        'app' => [
            'url' => 'http://localhost.com',
            'api' => 'http://localhost/api.php',
        ],
    ],
];

$config = $env[$_SERVER['ENVIRONMENT']];
