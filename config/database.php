<?php

return [
    'default' => env('DB_CONNECTION', 'mysql'),
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'database' => database_path(env('DB_DATABASE')),
            'prefix' => '',
        ],
    ],
    'migrations' => 'migrations',
    'redis' => [
        'client' => 'predis',
        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => 0,
        ],

    ],

];
