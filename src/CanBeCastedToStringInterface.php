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

/**
 * CanBeCastedToStringInterface.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
interface CanBeCastedToStringInterface
{
    /**
     * @return string
     */
    public function __toString(): string;
}
