<?php

/******************************************************************************
 * Copyright (c) 2023 AChang                                                  *
 ******************************************************************************/

declare(strict_types=1);

return [
    // nacos server url like https://nacos.hyperf.io, Priority is higher than host:port
    // 'url' => '',
    // The nacos host info
    'host'     => env('CONFIG_CENTER_HOST'),
    'port'     => env('CONFIG_CENTER_PORT'),
    'username' => 'nacos',
    'password' => 'nacos',
    'guzzle'   => [
        'config' => [
            'headers' => [
                'charset' => 'UTF-8',
            ],
        ],
    ],
];