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

use Assert\Assertion;
use Dlart\DDD\CanBeCastedToStringInterface as CanBeCastedToString;
use Dlart\DDD\ValueObject\AbstractValueObject;
use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * AbstractPassword.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
abstract class AbstractPassword extends AbstractValueObject implements CanBeCastedToString
{
    /**
     * @var string
     */
    private $password;

    /**
     * @param string $password
     */
    public function __construct(string $password)
    {
        Assertion::notEmpty($password);

        $this->assertThatPasswordIsValid($password);

        $this->password = $password;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->password;
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
            && (string) $this === (string) $valueObject
        ;
    }

    /**
     * @param string $password
     */
    protected function assertThatPasswordIsValid(string $password): void
    {
    }
}
