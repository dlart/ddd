<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Tests\Event;

use Assert\Assertion;
use Assert\AssertionFailedException;
use Dlart\DDD\Event\EventDispatcher;
use Dlart\DDD\Event\EventInterface as Event;
use Dlart\DDD\Event\Listener\AbstractEventListener as EventListener;
use PHPUnit\Framework\TestCase;

/**
 * EventDispatcherTest.
 *
 * @author Denis Lityagin <info@dlart.ru>
 */
class EventDispatcherTest extends TestCase
{
    public function testThatEventMustBeProvidedOnListenerRegistering(): void
    {
        $eventListener = self::getMockForAbstractClass(EventListener::class);

        $eventDispatcher = new EventDispatcher();

        self::expectException(AssertionFailedException::class);
        self::expectExceptionCode(Assertion::VALUE_EMPTY);

        $eventDispatcher->registerListener($eventListener, '');
    }

    public function testThatRegisteredListenerForEventIsCalled(): void
    {
        $event = self::getMockBuilder(Event::class)
            ->setMockClassName('FooEvent')
            ->getMockForAbstractClass()
        ;

        $eventListener = self::getMockBuilder(EventListener::class)
            ->setMethods(['handle'])
            ->getMockForAbstractClass()
        ;

        $eventListener
            ->expects(self::once())
            ->method('handle')
            ->with($event)
        ;

        $eventDispatcher = new EventDispatcher();

        $eventDispatcher->registerListener($eventListener, 'FooEvent');

        $eventDispatcher->dispatch($event);
    }
}
