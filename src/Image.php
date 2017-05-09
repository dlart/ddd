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
 * Image.
 *
 * @author Denis Lityagin <denis.lityagin@gmail.com>
 */
class Image extends AbstractValueObject implements CanBeCastedToString
{
    /**
     * @var int
     */
    private $height;

    /**
     * @var URI
     */
    private $uri;

    /**
     * @var int
     */
    private $width;

    /**
     * @param URI $uri
     * @param int $width
     * @param int $height
     */
    public function __construct(URI $uri, int $width, int $height)
    {
        $this->uri = $uri;

        Assertion::greaterThan($width, 0);

        $this->width = $width;

        Assertion::greaterThan($height, 0);

        $this->height = $height;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->uri;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @return URI
     */
    public function getURI(): URI
    {
        return $this->uri;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param ValueObject $valueObject
     *
     * @return bool
     */
    public function isEqualTo(ValueObject $valueObject): bool
    {
        /* @var self $valueObject */
        return
            parent::isEqualTo($valueObject)
            && $this->getURI()->isEqualTo($valueObject->getURI())
            && $this->getWidth() === $valueObject->getWidth()
            && $this->getHeight() === $valueObject->getHeight()
        ;
    }
}
