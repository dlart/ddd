<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Tests;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Dlart\DDD\Email;
use PHPUnit\Framework\TestCase;

/**
 * EmailTest.
 */
class EmailTest extends TestCase
{
    public function testThatEmailCanBeCompared(): void
    {
        $email = new Email('foo@bar.baz');
        $equalEmail = new Email('foo@bar.baz');
        $notEqualEmail = new Email('baz@bar.foo');

        self::assertTrue($email->isEqualTo($equalEmail));
        self::assertFalse($email->isEqualTo($notEqualEmail));
    }

    public function testThatEmailCanNotBeEmptyString(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::VALUE_EMPTY);

        new Email('');
    }

    public function testThatEmailCaseIsIgnoredOnComparing(): void
    {
        $email = new Email('foo@bar.baz');
        $uppercaseEmail = new Email('FOO@BAR.BAZ');

        self::assertTrue($email->isEqualTo($uppercaseEmail));
    }

    public function testThatEmailMustBeValid(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::INVALID_EMAIL);

        new Email('foo');
    }
}
