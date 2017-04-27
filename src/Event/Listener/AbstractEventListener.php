<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Event\Listener;

use Assert\Assertion;
use Dlart\DDD\Event\EventInterface as Event;
use Dlart\DDD\Event\Listener\EventListenerInterface as EventListener;

/**
 * AbstractEventListener.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
abstract class AbstractEventListener implements EventListener
{
    /**
     * @param Event $event
     */
    public function handle(Event $event): void
    {
        $this->assertThatHandleMethodForEventIsExist($event);

        $handleMethodName = $this->getHandleMethodNameForEvent($event);

        $this->$handleMethodName($event);
    }

    /**
     * @param Event $event
     */
    private function assertThatHandleMethodForEventIsExist(Event $event): void
    {
        Assertion::methodExists(
            $this->getHandleMethodNameForEvent($event),
            $this
        );
    }

    /**
     * @param Event $event
     *
     * @return string
     */
    private function getHandleMethodNameForEvent(Event $event): string
    {
        return 'handle'.$this->getNameOfEvent($event);
    }

    /**
     * @param Event $event
     *
     * @return string
     */
    private function getNameOfEvent(Event $event): string
    {
        $fullyQualifiedEventClassParts = explode('\\', get_class($event));

        return end($fullyQualifiedEventClassParts);
    }
}
