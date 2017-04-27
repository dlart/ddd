<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD;

use Dlart\DDD\Identity\IdentityInterface as Identity;

/**
 * HasIdentityInterface.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
interface HasIdentityInterface
{
    /**
     * @return Identity
     */
    public function getIdentity(): Identity;
}
