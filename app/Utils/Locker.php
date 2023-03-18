<?php

/******************************************************************************
 * Copyright (c) 2022. Archer                                                 *
 ******************************************************************************/

declare(strict_types=1);

namespace App\Utils;

use App\Constants\Keys;
use Hyperf\Redis\Redis;
use Hyperf\Utils\ApplicationContext;
use Lysice\HyperfRedisLock\RedisLock;

final class Locker
{
    public static function create(int|string $key, int $ttl, ?string $owner = null)
    {
        return make(
            name: RedisLock::class,
            parameters: [
                ApplicationContext::getContainer()->get(Redis::class),
                Keys::lock($key, $ttl),
                $ttl,
                $owner,
            ]
        );
    }
}
