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

use Dlart\DDD\CanBeCastedToStringInterface as CanBeCastedToString;
use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * StateInterface.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
interface StateInterface extends CanBeCastedToString, ValueObject
{
}
