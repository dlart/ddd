<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Identity\String;

use Assert\Assertion;
use Dlart\DDD\Identity\AbstractIdentity;
use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * AbstractStringIdentity.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
abstract class AbstractStringIdentity extends AbstractIdentity
{
    /**
     * @var string
     */
    private $identity;

    /**
     * @param string $identity
     */
    public function __construct(string $identity)
    {
        Assertion::notEmpty($identity);

        $this->assertThatIdentityIsValid($identity);

        $this->identity = $identity;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->identity;
    }

    /**
     * @param ValueObject $valueObject
     *
     * @return bool
     */
    public function isEqualTo(ValueObject $valueObject): bool
    {
        return
            parent::isEqualTo($valueObject)
            && $this->normalizeIdentityBeforeCompare((string) $this)
            === $this->normalizeIdentityBeforeCompare((string) $valueObject)
        ;
    }

    /**
     * @param string $identity
     */
    protected function assertThatIdentityIsValid(string $identity): void
    {
    }

    /**
     * @param string $identity
     *
     * @return string
     */
    protected function normalizeIdentityBeforeCompare(string $identity): string
    {
        return $identity;
    }
}
