<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Identity;

use Dlart\DDD\CanBeCastedToStringInterface as CanBeCastedToString;
use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * IdentityInterface.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
interface IdentityInterface extends CanBeCastedToString, ValueObject
{
}
