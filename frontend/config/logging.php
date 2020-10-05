<?php

use Monolog\Handler\NullHandler;

return [
    'default' => env('LOG_CHANNEL', 'syslog'),

    'channels' => [
        'syslog' => [
            'driver' => 'syslog',
            'channels' => ['single'],
        ],

        'null' => [
            'driver' => 'monolog',
            'handler' => NullHandler::class,
        ],
    ],
];