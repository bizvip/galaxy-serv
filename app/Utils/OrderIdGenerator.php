<?php
/******************************************************************************
 * Copyright (c) 2023 A. C.                                                   *
 ******************************************************************************/

declare(strict_types=1);

namespace App\Utils;

use Hyperf\Snowflake\IdGenerator\SnowflakeIdGenerator;

final readonly class OrderIdGenerator
{
    public function __construct(private SnowflakeIdGenerator $idGenerator) { }

    public function getId(string $prefix = ''): string
    {
        return $prefix.$this->idGenerator->generate();
    }
}