<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\State\Exception;

use Dlart\DDD\State\Exception\IllegalStateTransitionExceptionInterface as IllegalStateTransitionException;
use Dlart\DDD\State\StateInterface as State;

/**
 * IllegalStateTransitionExceptionInterface.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
interface IllegalStateTransitionExceptionInterface
{
    /**
     * @param State $sourceState
     * @param State $targetState
     *
     * @return IllegalStateTransitionExceptionInterface
     */
    public static function createFromSourceAndTargetStates(
        State $sourceState,
        State $targetState
    ): IllegalStateTransitionException;
}
