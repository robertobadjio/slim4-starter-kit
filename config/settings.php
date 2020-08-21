<?php

use Monolog\Logger;

return static function(string $appEnv) {
    $settings =  [
        'app_env' => $appEnv,
        'di_compilation_path' => __DIR__ . '/../runtime/cache',
        'display_error_details' => false,
        'log_errors' => true,

        'logger' => [
            'name' => 'slim-app',
            'path' => 'php://stderr',
            'level' => Logger::DEBUG,
        ],

        'view' => [
            'path' => __DIR__ . '/../view',
            'cache' => __DIR__ . '/../runtime/cache-view',
        ],
    ];

    if ($appEnv === 'DEVELOPMENT') {
        $settings['di_compilation_path'] = '';
        $settings['display_error_details'] = true;
        $settings['logger']['path'] = __DIR__ . '/../runtime/log/app.log';
    }

    return $settings;
};
