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

use Assert\Assert;
use Dlart\DDD\CanBeCastedToStringInterface as CanBeCastedToString;
use Dlart\DDD\ValueObject\AbstractValueObject;
use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * Email.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class Email extends AbstractValueObject implements CanBeCastedToString
{
    /**
     * @var string
     */
    private $email;

    /**
     * @param string $email
     */
    public function __construct(string $email)
    {
        Assert::that($email)->notEmpty()->email($email);

        $this->email = $email;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->email;
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
            && strtolower((string) $this)
            === strtolower((string) $valueObject)
        ;
    }
}
