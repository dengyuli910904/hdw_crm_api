<?php

return [
    'defaults' => [
        'guard' => 'promoter',
        'passwords' => 'promoter',
    ],
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'promoterss' => [
            'driver' => 'session',
            'provider' => 'promoter',
        ],
        'promoter' => [
            'driver' => 'passport',
            'provider' => 'promoter',
        ],
    ],

    'providers' => [
        'promoter' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Promoter::class,
        ],
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\User::class,
        ],

//         'users' => [
//             'driver' => 'database',
//             'table' => 'users',
//         ],
    ],
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'promoter' => [
            'provider' => 'promoter',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'password_timeout' => 10800,

];
