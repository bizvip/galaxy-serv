<?php

/******************************************************************************
 * Copyright (c) 2023 AChang                                                  *
 ******************************************************************************/

declare(strict_types=1);


use Hyperf\HttpServer\Router\Router;

Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/favicon.ico', static function () {
    return '';
});
