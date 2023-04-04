<?php

return [


    'driver' => env('MAIL_DRIVER', 'smtp'),
    'host' => env('MAIL_HOST', 'plataforma.escoladariqueza.com.br'),
    'port' => env('MAIL_PORT', 25),


    'from' => [
        'address' => 'no-reply@plataforma.escoladariqueza.com.br',
        'name' => 'Escola da riqueza',
    ],

    'username' => env('MAIL_USERNAME'),

    'password' => env('MAIL_PASSWORD'),

    'sendmail' => '/usr/sbin/sendmail -bs',

];
