<?php

/******************************************************************************
 * Copyright (c) 2023 A. C.                                                   *
 ******************************************************************************/

declare(strict_types=1);

namespace App\Controller;

use App\Model\LongVideo;
use Hyperf\Contract\ConfigInterface;

final class IndexController extends AbstractController
{
    public function index(): array
    {
        $conf = $this->container->get(ConfigInterface::class);
        $c    = $conf->get('galaxy');

        $user   = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'info'    => '112233',
            'method'  => $method,
            'message' => "Hello {$user}.",
            'c'       => $c,
            'db'      => LongVideo::query()->where(['id' => 10072])->first(),
        ];
    }
}
