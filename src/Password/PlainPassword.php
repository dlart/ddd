<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Password;

use Assert\Assert;
use Dlart\DDD\Password\AbstractPassword as Password;

/**
 * PlainPassword.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class PlainPassword extends Password
{
    const MIN_LENGTH = 12;

    const MAX_LENGTH = 72;

    /**
     * @param string $password
     */
    protected function assertThatPasswordIsValid(string $password): void
    {
        Assert::that($password)
            ->minLength(self::MIN_LENGTH)
            ->maxLength(self::MAX_LENGTH)
        ;
    }
}
