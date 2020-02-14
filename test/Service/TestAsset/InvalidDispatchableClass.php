<?php

/**
 * @see       https://github.com/laminas/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\Service\TestAsset;

use DomainException;

class InvalidDispatchableClass
{
    public function __construct()
    {
        throw new DomainException('Should not instantiate this!');
    }
}
