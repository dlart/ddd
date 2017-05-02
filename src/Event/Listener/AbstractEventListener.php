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
use Verraes\ClassFunctions\ClassFunctions;

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
        $handleMethodName = 'handle'.ClassFunctions::short($event);

        Assertion::methodExists(
            $handleMethodName,
            $this
        );

        $this->$handleMethodName($event);
    }
}
