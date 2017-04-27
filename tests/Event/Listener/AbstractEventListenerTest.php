<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Tests\Event\Listener;

use Assert\Assertion;
use Assert\InvalidArgumentException;
use Dlart\DDD\Event\EventInterface as Event;
use Dlart\DDD\Event\Listener\AbstractEventListener as EventListener;
use PHPUnit\Framework\TestCase;

/**
 * AbstractEventListenerTest.
 *
 * @author Denis Lityagin <info@dlart.ru>
 */
class AbstractEventListenerTest extends TestCase
{
    public function testThatExceptionThrowsIfHandleMethodForEventIsNotExist(): void
    {
        /** @var Event $event */
        $event = self::getMockForAbstractClass(Event::class);

        /** @var EventListener $eventListener */
        $eventListener = self::getMockForAbstractClass(EventListener::class);

        self::expectException(InvalidArgumentException::class);
        self::expectExceptionCode(Assertion::INVALID_METHOD);

        $eventListener->handle($event);
    }

    public function testThatHandleMethodForEventIsCalled(): void
    {
        /** @var Event $event */
        $event = self::getMockBuilder(Event::class)
            ->setMockClassName('FooEvent')
            ->getMockForAbstractClass()
        ;

        $eventListener = self::getMockBuilder(EventListener::class)
            ->setMethods(['handleFooEvent'])
            ->getMockForAbstractClass()
        ;

        $eventListener
            ->expects(self::once())
            ->method('handleFooEvent')
            ->with($event)
        ;

        /* @var EventListener $eventListener */
        $eventListener->handle($event);
    }
}
