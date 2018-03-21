<?php

return [
    'defaults' => [
        'guard' => 'front',
        'passwords' => 'front',
    ],
    'guards' => [
        'front' => [
            'driver' => 'session',
            'provider' => 'front',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin',
        ],
    ],
    'providers' => [
        'front' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model' => App\Administrator::class,
        ],
    ],

    'passwords' => [
        'front' => [
            'provider' => 'front',
            'email' => 'mails.auth.front.passwords',
            'table' => 'password_resets',
            'expire' => 60 * 24 * 4,
        ],
        'admin' => [
            'provider' => 'admin',
            'email' => 'mails.auth.admin.passwords',
            'table' => 'password_resets',
            'expire' => 60 * 24 * 4,
        ],
    ],

];
