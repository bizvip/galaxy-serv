<?php

/******************************************************************************
 * Copyright (c) 2023 A. C.                                                   *
 ******************************************************************************/

declare(strict_types=1);

namespace App\Controller;

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
            'method'  => $method,
            'message' => "Hello {$user}.",
            'c'       => $c,
        ];
    }
}
