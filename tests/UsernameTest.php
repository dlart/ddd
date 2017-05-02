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
use Dlart\DDD\Username;
use PHPUnit\Framework\TestCase;

/**
 * UsernameTest.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class UsernameTest extends TestCase
{
    public function testThatUsernameCanBeCompared(): void
    {
        $username = new Username('foo');
        $equalUsername = new Username('foo');
        $notEqualUsername = new Username('bar');

        self::assertTrue($username->isEqualTo($equalUsername));
        self::assertFalse($username->isEqualTo($notEqualUsername));
    }

    public function testThatUsernameCanNotBeEmptyString(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::VALUE_EMPTY);

        new Username('');
    }
}
