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
use Dlart\DDD\Password\PlainPassword;
use PHPUnit\Framework\TestCase;

/**
 * PlainPasswordTest.
 *
 * @author Denis Lityagin <info@dlart.ru>
 */
class PlainPasswordTest extends TestCase
{
    public function testThatPlainPasswordLengthCanNotBeLessThanMinimalExpected(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::INVALID_MIN_LENGTH);

        new PlainPassword(str_repeat(' ', PlainPassword::MIN_LENGTH - 1));
    }

    public function testThatPlainPasswordLengthCanNotBeMoreThanMaximumExpected(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::INVALID_MAX_LENGTH);

        new PlainPassword(str_repeat(' ', PlainPassword::MAX_LENGTH + 1));
    }
}
