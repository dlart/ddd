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

use Dlart\DDD\Moment;
use PHPUnit\Framework\TestCase;

class MomentTest extends TestCase
{
    public function testThatMomentCanBeCompared(): void
    {
        $moment = Moment::createFromDate(2017, 1, 1, 0, 0, 0);
        $equalMoment = Moment::createFromDate(2017, 1, 1, 0, 0, 0);
        $notEqualMoment = Moment::createFromDate(2017, 1, 1, 0, 0, 1);
        $greaterMoment = Moment::createFromDate(2017, 1, 1, 0, 0, 1);
        $lessMoment = Moment::createFromDate(2016, 1, 1, 0, 0, 0);

        self::assertTrue($moment->isEqualTo($equalMoment));
        self::assertFalse($moment->isEqualTo($notEqualMoment));
        self::assertTrue($moment->isLessThan($greaterMoment));
        self::assertFalse($moment->isLessThan($lessMoment));
        self::assertTrue($moment->isGreaterThanOrEqualTo($lessMoment));
        self::assertTrue($moment->isGreaterThanOrEqualTo($equalMoment));
        self::assertTrue($moment->isLessThan($greaterMoment));
        self::assertFalse($moment->isLessThan($lessMoment));
        self::assertTrue($moment->isLessThanOrEqualTo($greaterMoment));
        self::assertTrue($moment->isLessThanOrEqualTo($equalMoment));
    }
}
