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
use Dlart\DDD\URI;
use PHPUnit\Framework\TestCase;

/**
 * URITest.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class URITest extends TestCase
{
    public function testThatURICanBeCompared(): void
    {
        $uri = new URI('http://foo.bar/');
        $equalURI = new URI('http://foo.bar/');
        $equalURIWithoutLeadingSlash = new URI('http://foo.bar');
        $notEqualURI = new URI('http://foo.bar.baz/foo');

        self::assertTrue($uri->isEqualTo($equalURI));
        self::assertTrue($uri->isEqualTo($equalURIWithoutLeadingSlash));
        self::assertFalse($uri->isEqualTo($notEqualURI));
    }

    public function testThatURICanNotBeEmptyString(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::VALUE_EMPTY);

        new URI('');
    }

    public function testThatURICaseIsIgnoredOnComparing(): void
    {
        $uri = new URI('http://foo.bar/');
        $uppercaseURI = new URI('HTTP://FOO.BAR/');

        self::assertTrue($uri->isEqualTo($uppercaseURI));
    }

    public function testThatURIMustBeValid(): void
    {
        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::INVALID_URL);

        new URI('foo');
    }
}
