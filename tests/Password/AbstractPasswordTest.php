<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Tests\Password;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Dlart\DDD\Password\AbstractPassword as Password;
use PHPUnit\Framework\TestCase;

/**
 * AbstractPasswordTest.
 *
 * @author Denis Lityagin <info@dlart.ru>
 */
class AbstractPasswordTest extends TestCase
{
    public function testThatPasswordCanNotBeEmpty(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::VALUE_EMPTY);

        self::getMockForAbstractClass(Password::class, ['']);
    }

    public function testThatPasswordsCanBeCompared(): void
    {
        /** @var Password $password */
        $password = self::getMockForAbstractClass(
            Password::class,
            ['foo']
        );

        /** @var Password $equalPassword */
        $equalPassword = self::getMockForAbstractClass(
            Password::class,
            ['foo']
        );

        /** @var Password $notEqualPassword */
        $notEqualPassword = self::getMockForAbstractClass(
            Password::class,
            ['bar']
        );

        self::assertTrue($password->isEqualTo($equalPassword));
        self::assertFalse($password->isEqualTo($notEqualPassword));
    }
}
