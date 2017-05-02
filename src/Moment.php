<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD;

use Carbon\Carbon;
use Dlart\DDD\CanBeCastedToStringInterface as CanBeCastedToString;
use Dlart\DDD\ValueObject\AbstractValueObject;
use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * Moment.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class Moment extends AbstractValueObject implements CanBeCastedToString
{
    /**
     * @var Carbon
     */
    private $carbon;

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     * @param int $hour
     * @param int $minute
     * @param int $second
     *
     * @return Moment
     */
    public static function createFromDate(
        int $year,
        int $month,
        int $day,
        int $hour,
        int $minute,
        int $second
    ): Moment {
        return new self(
            Carbon::create(
                $year,
                $month,
                $day,
                $hour,
                $minute,
                $second
            )
        );
    }

    /**
     * @return Moment
     */
    public static function createFromNow(): Moment
    {
        return new self(Carbon::now());
    }

    /**
     * @param string $string
     *
     * @return Moment
     */
    public static function createFromString(string $string): Moment
    {
        return new self(Carbon::createFromFormat(
            'Y-m-d H:i:s',
            $string
        ));
    }

    /**
     * @param Carbon $carbon
     */
    private function __construct(Carbon $carbon)
    {
        $this->carbon = $carbon;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->carbon->toDateTimeString();
    }

    /**
     * @return int
     */
    public function getDay(): int
    {
        return $this->carbon->day;
    }

    /**
     * @return int
     */
    public function getHour(): int
    {
        return $this->carbon->hour;
    }

    /**
     * @return int
     */
    public function getMinute(): int
    {
        return $this->carbon->minute;
    }

    /**
     * @return int
     */
    public function getMonth(): int
    {
        return $this->carbon->month;
    }

    /**
     * @return int
     */
    public function getSecond(): int
    {
        return $this->carbon->second;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->carbon->year;
    }

    /**
     * @param ValueObject $valueObject
     *
     * @return bool
     */
    public function isEqualTo(ValueObject $valueObject): bool
    {
        /* @var self $valueObject */
        return
            parent::isEqualTo($valueObject)
            && $this->carbon->equalTo(
                Carbon::create(
                    $valueObject->getYear(),
                    $valueObject->getMonth(),
                    $valueObject->getDay(),
                    $valueObject->getHour(),
                    $valueObject->getMinute(),
                    $valueObject->getSecond()
                )
            )
        ;
    }

    /**
     * @param Moment $moment
     *
     * @return bool
     */
    public function isGreaterThan(Moment $moment): bool
    {
        return $this->carbon->greaterThan(
            Carbon::create(
                $moment->getYear(),
                $moment->getMonth(),
                $moment->getDay(),
                $moment->getHour(),
                $moment->getMinute(),
                $moment->getSecond()
            )
        );
    }

    /**
     * @param Moment $moment
     *
     * @return bool
     */
    public function isGreaterThanOrEqualTo(Moment $moment): bool
    {
        return $this->carbon->greaterThanOrEqualTo(
            Carbon::create(
                $moment->getYear(),
                $moment->getMonth(),
                $moment->getDay(),
                $moment->getHour(),
                $moment->getMinute(),
                $moment->getSecond()
            )
        );
    }

    /**
     * @param Moment $moment
     *
     * @return bool
     */
    public function isLessThan(Moment $moment): bool
    {
        return $this->carbon->lessThan(
            Carbon::create(
                $moment->getYear(),
                $moment->getMonth(),
                $moment->getDay(),
                $moment->getHour(),
                $moment->getMinute(),
                $moment->getSecond()
            )
        );
    }

    /**
     * @param Moment $moment
     *
     * @return bool
     */
    public function isLessThanOrEqualTo(Moment $moment): bool
    {
        return $this->carbon->lessThanOrEqualTo(
            Carbon::create(
                $moment->getYear(),
                $moment->getMonth(),
                $moment->getDay(),
                $moment->getHour(),
                $moment->getMinute(),
                $moment->getSecond()
            )
        );
    }
}
