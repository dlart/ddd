<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Tests\ValueObject;

use Dlart\DDD\ValueObject\AbstractValueObject as ValueObject;
use PHPUnit\Framework\TestCase;

/**
 * AbstractValueObjectTest.
 *
 * @author Denis Lityagin <info@dlart.ru>
 */
class AbstractValueObjectTest extends TestCase
{
    public function testThatOnlyValueObjectsOfSameClassCanBeEqual(): void
    {
        /** @var ValueObject $valueObject */
        $valueObject = self::getMockBuilder(ValueObject::class)
            ->setMockClassName('ValueObject')
            ->getMockForAbstractClass()
        ;

        /** @var ValueObject $valueObjectOfAnotherClass */
        $valueObjectOfAnotherClass = self::getMockBuilder(ValueObject::class)
            ->setMockClassName('ValueObjectOfAnotherClass')
            ->getMockForAbstractClass()
        ;

        self::assertFalse(
            $valueObject->isEqualTo($valueObjectOfAnotherClass)
        );
    }
}
