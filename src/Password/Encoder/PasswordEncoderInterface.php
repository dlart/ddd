<?php

/*
 * This file is part of DDD package.
 *
 * (c) Denis Lityagin <denis.lityagin@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled with this
 * source code in the file LICENSE.
 */

namespace Dlart\DDD\Password\Encoder;

use Dlart\DDD\Password\EncodedPassword;
use Dlart\DDD\Password\PlainPassword;

/**
 * PasswordEncoderInterface.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
interface PasswordEncoderInterface
{
    /**
     * @param PlainPassword $plainPassword
     *
     * @return EncodedPassword
     */
    public function encode(PlainPassword $plainPassword): EncodedPassword;
}
