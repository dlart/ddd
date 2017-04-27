<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\State;

use Dlart\DDD\State\StateInterface as State;
use Dlart\DDD\ValueObject\AbstractValueObject as ValueObject;

/**
 * AbstractState.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
abstract class AbstractState extends ValueObject implements State
{
}
