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

use DateTime;
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
        self::assertTrue($moment->isGreaterThan($lessMoment));
        self::assertFalse($moment->isGreaterThan($greaterMoment));
        self::assertTrue($moment->isGreaterThanOrEqualTo($lessMoment));
        self::assertTrue($moment->isGreaterThanOrEqualTo($equalMoment));
        self::assertTrue($moment->isLessThan($greaterMoment));
        self::assertFalse($moment->isLessThan($lessMoment));
        self::assertTrue($moment->isLessThanOrEqualTo($greaterMoment));
        self::assertTrue($moment->isLessThanOrEqualTo($equalMoment));
    }

    public function testThatMomentCanBeCreatedFromAndCastedToString(): void
    {
        self::assertEquals(
            '2017-01-01 00:00:00',
            (string) Moment::createFromString('2017-01-01 00:00:00')
        );
    }

    public function testThatMomentCanBeCreatedFromNow(): void
    {
        $moment = Moment::createFromNow();

        $now = new DateTime();

        self::assertEquals($now->format('Y'), $moment->getYear());
        self::assertEquals($now->format('m'), $moment->getMonth());
        self::assertEquals($now->format('d'), $moment->getDay());
        self::assertEquals($now->format('H'), $moment->getHour());
        self::assertEquals($now->format('i'), $moment->getMinute());
        self::assertEquals($now->format('s'), $moment->getSecond());
    }
}
