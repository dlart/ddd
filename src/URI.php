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

use Assert\Assertion;
use Dlart\DDD\CanBeCastedToStringInterface as CanBeCastedToString;
use Dlart\DDD\ValueObject\AbstractValueObject;
use Dlart\DDD\ValueObject\ValueObjectInterface as ValueObject;

/**
 * URI.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class URI extends AbstractValueObject implements CanBeCastedToString
{
    /**
     * @var string
     */
    private $uri;

    /**
     * @param string $uri
     */
    public function __construct(string $uri)
    {
        Assertion::notEmpty($uri);

        $this->assertThatURIIsValid($uri);

        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->uri;
    }

    /**
     * @param ValueObject $valueObject
     *
     * @return bool
     */
    public function isEqualTo(ValueObject $valueObject): bool
    {
        return
            parent::isEqualTo($valueObject)
            && $this->normalizeUriBeforeCompare((string) $this)
            === $this->normalizeUriBeforeCompare((string) $valueObject)
        ;
    }

    /**
     * @param string $uri
     */
    protected function assertThatURIIsValid(string $uri): void
    {
        Assertion::url($uri);
    }

    /**
     * @param string $uri
     *
     * @return string
     */
    protected function normalizeUriBeforeCompare(string $uri): string
    {
        return trim(strtolower($uri), '/');
    }
}
