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
use RuntimeException;

/**
 * AbstractIllegalStateTransitionException.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
abstract class AbstractIllegalStateTransitionException extends RuntimeException implements IllegalStateTransitionException
{
    /**
     * @param State $sourceState
     * @param State $targetState
     *
     * @return IllegalStateTransitionException
     */
    public static function createFromSourceAndTargetStates(
        State $sourceState,
        State $targetState
    ): IllegalStateTransitionException {
        return new static(
            sprintf(
                'Illegal state transition from "%s" to "%s".',
                get_class($sourceState),
                get_class($targetState)
            )
        );
    }
}
