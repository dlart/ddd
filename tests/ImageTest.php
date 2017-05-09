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
use Dlart\DDD\Image;
use Dlart\DDD\URI;
use PHPUnit\Framework\TestCase;

/**
 * ImageTest
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class ImageTest extends TestCase
{
    public function testThatHeightOfImageMustBeGreaterThanZero(): void
    {
        /** @var URI $uri */
        $uri = self::getMockBuilder(URI::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::INVALID_GREATER);

        new Image($uri, 1, 0);
    }

    public function testThatImageCanBeCompared(): void
    {
        $uri = new URI('http://foo.bar/baz');

        $image = new Image($uri, 100, 100);
        $equalImage = new Image($uri, 100, 100);
        $notEqualImage = new Image($uri, 200, 200);

        self::assertTrue($image->isEqualTo($equalImage));
        self::assertFalse($image->isEqualTo($notEqualImage));
    }

    public function testThatWidthOfImageMustBeGreaterThanZero(): void
    {
        /** @var URI $uri */
        $uri = self::getMockBuilder(URI::class)
            ->disableOriginalConstructor()
            ->getMock()
        ;

        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::INVALID_GREATER);

        new Image($uri, 0, 1);
    }
}
