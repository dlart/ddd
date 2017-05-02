<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Enum;

use Verraes\ClassFunctions\ClassFunctions;

/**
 * AbstractEnum.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
abstract class AbstractEnum
{
    /**
     * @return array
     */
    public static function toArray(): array
    {
        return ClassFunctions::constants(static::class);
    }
}
