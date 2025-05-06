<?php

return [

    'defaults' => [
        'guard' => 'intern',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'intern' => [
            'driver' => 'session',
            'provider' => 'interns',
        ],
        'nhanvien' => [
            'driver' => 'session',
            'provider' => 'nhanviens',
        ]
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'interns' => [
            'driver' => 'eloquent',
            'model' => App\Models\Intern::class,
        ],
        'nhanviens' => [
            'driver' => 'eloquent',
            'model' => App\Models\Nhanvien::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
