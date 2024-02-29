<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel
    |--------------------------------------------------------------------------
    |
    | Define here all the Laravel elements that must be cached.
    |
    */

    'config' => [
        'command' => 'config:cache',
        'run' => true,
    ],
    'routes' => [
        'command' => 'route:cache',
        'run' => true,
    ],
    'events' => [
        'command' => 'event:cache',
        'run' => true,
    ],
    'views' => [
        'command' => 'view:cache',
        'run' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Additional
    |--------------------------------------------------------------------------
    |
    | Define any additional items that should be cached here.
    | Usually from third-party packages or just from your application.
    |
    */

    // blade-ui-kit/blade-icons
    'icons' => [
        'command' => 'icons:cache',
        'run' => false,
    ],
];
