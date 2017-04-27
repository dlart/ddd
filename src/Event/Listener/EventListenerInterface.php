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

use Dlart\DDD\Event\EventInterface as Event;

/**
 * EventListenerInterface.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
interface EventListenerInterface
{
    /**
     * @param Event $event
     */
    public function handle(Event $event): void;
}
