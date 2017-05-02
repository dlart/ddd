<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD;

use Assert\Assertion;
use Dlart\DDD\CanBeCastedToStringInterface as CanBeCastedToString;
use Dlart\DDD\ValueObject\AbstractValueObject;
use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * Username.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class Username extends AbstractValueObject implements CanBeCastedToString
{
    /**
     * @var string
     */
    private $username;

    /**
     * @param string $username
     */
    public function __construct(string $username)
    {
        Assertion::notEmpty($username);

        $this->assertTharUsernameIsValid($username);

        $this->username = $username;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->username;
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
            && $this->normalizeUsernameBeforeCompare((string) $this)
            === $this->normalizeUsernameBeforeCompare((string) $valueObject)
        ;
    }

    /**
     * @param string $username
     */
    protected function assertTharUsernameIsValid(string $username): void
    {
    }

    /**
     * @param string $username
     *
     * @return string
     */
    protected function normalizeUsernameBeforeCompare(string $username): string
    {
        return $username;
    }
}
