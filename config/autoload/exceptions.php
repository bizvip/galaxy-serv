<?php

/******************************************************************************
 * Copyright (c) 2023 AChang                                                  *
 ******************************************************************************/

declare(strict_types=1);

return [
    'handler' => [
        'http' => [
            Hyperf\HttpServer\Exception\Handler\HttpExceptionHandler::class,
            App\Exception\Handler\AppExceptionHandler::class,
        ],
    ],
];
