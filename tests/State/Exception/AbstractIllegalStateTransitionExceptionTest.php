<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Tests\State\Exception;

use Dlart\DDD\State\Exception\AbstractIllegalStateTransitionException as IllegalStateTransitionException;
use Dlart\DDD\State\StateInterface as State;
use PHPUnit\Framework\TestCase;

/**
 * AbstractIllegalStateTransitionExceptionTest.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class AbstractIllegalStateTransitionExceptionTest extends TestCase
{
    public function testThatFactoryMethodReturnsInstanceOfException(): void
    {
        /** @var IllegalStateTransitionException $illegalStateTransitionException */
        $illegalStateTransitionException = self::getMockForAbstractClass(
            IllegalStateTransitionException::class
        );

        /** @var State $sourceState */
        $sourceState = self::getMockForAbstractClass(State::class);

        /** @var State $targetState */
        $targetState = self::getMockForAbstractClass(State::class);

        self::assertInstanceOf(
            IllegalStateTransitionException::class,
            $illegalStateTransitionException::createFromSourceAndTargetStates(
                $sourceState,
                $targetState
            )
        );
    }
}
