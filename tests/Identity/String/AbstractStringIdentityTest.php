<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Tests\Identity\String;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Dlart\DDD\Identity\String\AbstractStringIdentity as StringIdentity;
use PHPUnit\Framework\TestCase;

/**
 * AbstractStringIdentityTest.
 *
 * @author Denis Lityagin <info@dlart.ru>
 */
class AbstractStringIdentityTest extends TestCase
{
    public function testThatStringIdentityCanBeCompared(): void
    {
        /** @var StringIdentity $stringIdentity */
        $stringIdentity = self::getMockForAbstractClass(
            StringIdentity::class,
            ['foo']
        );

        /** @var StringIdentity $equalStringIdentity */
        $equalStringIdentity = self::getMockForAbstractClass(
            StringIdentity::class,
            ['foo']
        );

        /** @var StringIdentity $notEqualStringIdentity */
        $notEqualStringIdentity = self::getMockForAbstractClass(
            StringIdentity::class,
            ['bar']
        );

        self::assertTrue($stringIdentity->isEqualTo($equalStringIdentity));
        self::assertFalse($stringIdentity->isEqualTo($notEqualStringIdentity));
    }

    public function testThatStringIdentityCanNotBeEmpty(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::VALUE_EMPTY);

        self::getMockForAbstractClass(
            StringIdentity::class,
            ['']
        );
    }
}
