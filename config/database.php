<?php

use Illuminate\Support\Str;

return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'empresa' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_EMPRESA', '127.0.0.1'),
            'port' => env('DB_PORT_EMPRESA', '3306'),
            'database' => env('DB_DATABASE_EMPRESA', 'empresa'),
            'username' => env('DB_USERNAME_EMPRESA', 'root'),
            'password' => env('DB_PASSWORD_EMPRESA', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'strict' => true,
            'engine' => null,
        ],

        'empresa_2' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_EMPRESA2', '127.0.0.1'),
            'port' => env('DB_PORT_EMPRESA2', '3306'),
            'database' => env('DB_DATABASE_EMPRESA2', 'empresa_2'),
            'username' => env('DB_USERNAME_EMPRESA2', 'root'),
            'password' => env('DB_PASSWORD_EMPRESA2', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'strict' => true,
            'engine' => null,
        ],

        'empresa_3' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_EMPRESA3', '127.0.0.1'),
            'port' => env('DB_PORT_EMPRESA3', '3306'),
            'database' => env('DB_DATABASE_EMPRESA3', 'empresa_3'),
            'username' => env('DB_USERNAME_EMPRESA3', 'root'),
            'password' => env('DB_PASSWORD_EMPRESA3', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'strict' => true,
            'engine' => null,
        ],

        'empresa_4' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST_EMPRESA4', '127.0.0.1'),
            'port' => env('DB_PORT_EMPRESA4', '3306'),
            'database' => env('DB_DATABASE_EMPRESA4', 'empresa_4'),
            'username' => env('DB_USERNAME_EMPRESA4', 'root'),
            'password' => env('DB_PASSWORD_EMPRESA4', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'strict' => true,
            'engine' => null,
        ],
    ],

];
