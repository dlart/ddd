<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\ValueObject;

use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * ValueObjectInterface.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
interface ValueObjectInterface
{
    /**
     * @param ValueObject $valueObject
     *
     * @return bool
     */
    public function isEqualTo(ValueObject $valueObject): bool;
}
