<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Event;

use Assert\Assertion;
use Dlart\DDD\Event\EventInterface as Event;
use Dlart\DDD\Event\Listener\EventListenerInterface as Listener;

/**
 * EventDispatcher.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class EventDispatcher
{
    /**
     * @var Listener[]
     */
    private $listeners = [];

    /**
     * @param Event $event
     */
    public function dispatch(Event $event): void
    {
        if ($this->isListenerForEventRegistered($event)) {
            $this->getListenerForEvent($event)->handle($event);
        }
    }

    /**
     * @param Listener $listener
     * @param string   $fullyQualifiedEventClassName
     */
    public function registerListener(
        Listener $listener,
        string $fullyQualifiedEventClassName
    ): void {
        Assertion::notEmpty($fullyQualifiedEventClassName);

        $this->listeners[$fullyQualifiedEventClassName] = $listener;
    }

    /**
     * @param Event $event
     *
     * @return null|Listener
     */
    private function getListenerForEvent(Event $event): ?Listener
    {
        return $this->listeners[get_class($event)] ?? null;
    }

    /**
     * @param Event $event
     *
     * @return bool
     */
    private function isListenerForEventRegistered(Event $event): bool
    {
        return isset($this->listeners[get_class($event)]);
    }
}
