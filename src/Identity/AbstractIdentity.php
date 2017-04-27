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

use Dlart\DDD\Identity\IdentityInterface as Identity;
use Dlart\DDD\ValueObject\AbstractValueObject as ValueObject;

/**
 * AbstractIdentity.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
abstract class AbstractIdentity extends ValueObject implements Identity
{
}
