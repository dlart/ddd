<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Identity\String\UUID;

use Assert\Assertion;
use Dlart\DDD\Identity\String\AbstractStringIdentity as StringIdentity;

/**
 * AbstractUUIDIdentity.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
abstract class AbstractUUIDIdentity extends StringIdentity
{
    /**
     * @param string $identity
     */
    protected function assertThatIdentityIsValid(string $identity): void
    {
        Assertion::uuid($identity);
    }

    /**
     * @param string $identity
     *
     * @return string
     */
    protected function normalizeIdentityBeforeCompare(string $identity): string
    {
        return strtolower($identity);
    }
}
