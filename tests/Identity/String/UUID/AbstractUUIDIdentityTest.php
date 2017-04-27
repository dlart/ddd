<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Tests\Identity\String\UUID;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Dlart\DDD\Identity\String\UUID\AbstractUUIDIdentity as UUIDIdentity;
use PHPUnit\Framework\TestCase;

/**
 * AbstractUUIDIdentityTest.
 *
 * @author Denis Lityagin <info@dlart.ru>
 */
class AbstractUUIDIdentityTest extends TestCase
{
    public function testThatIdentityCaseIsIgnoredOnComparing(): void
    {
        /** @var UUIDIdentity $uuidIdentity */
        $uuidIdentity = self::getMockForAbstractClass(
            UUIDIdentity::class,
            ['FFFFFFFF-FFFF-FFFF-FFFF-FFFFFFFFFFFF']
        );

        /** @var UUIDIdentity $uuidIdentity */
        $equalUuidIdentity = self::getMockForAbstractClass(
            UUIDIdentity::class,
            ['ffffffff-ffff-ffff-ffff-ffffffffffff']
        );

        self::assertTrue($uuidIdentity->isEqualTo($equalUuidIdentity));
    }

    public function testThatUuidCanBeCompared(): void
    {
        /** @var UUIDIdentity $uuidIdentity */
        $uuidIdentity = self::getMockForAbstractClass(
            UUIDIdentity::class,
            ['00000000-0000-0000-0000-000000000000']
        );

        /** @var UUIDIdentity $uuidIdentity */
        $equalUuidIdentity = self::getMockForAbstractClass(
            UUIDIdentity::class,
            ['00000000-0000-0000-0000-000000000000']
        );

        /** @var UUIDIdentity $uuidIdentity */
        $notEqualUuidIdentity = self::getMockForAbstractClass(
            UUIDIdentity::class,
            ['52ab9e1f-61f4-4d0a-b900-db2d97a08ecb']
        );

        self::assertTrue($uuidIdentity->isEqualTo($equalUuidIdentity));
        self::assertFalse($uuidIdentity->isEqualTo($notEqualUuidIdentity));
    }

    public function testThatUuidMustBeValid(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::INVALID_UUID);

        self::getMockForAbstractClass(
            UUIDIdentity::class,
            ['foo']
        );
    }
}
