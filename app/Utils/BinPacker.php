<?php

/******************************************************************************
 * Copyright (c) 2023 A. C.                                                   *
 ******************************************************************************/

namespace App\Utils;

use Hyperf\Contract\PackerInterface;

final class BinPacker implements PackerInterface
{
    public function pack(mixed $data): string
    {
        return \igbinary_serialize($data);
    }

    public function unpack(string $data): mixed
    {
        return \igbinary_unserialize($data);
    }
}
