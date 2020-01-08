<?php

/**
 * @see       https://github.com/laminasframwork/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminasframwork/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminasframwork/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc;

use Laminas\Mvc\Exception\InvalidMiddlewareException;
use PHPUnit\Framework\TestCase;

use function uniqid;

/**
 * @covers \Laminas\Mvc\Exception\InvalidMiddlewareException
 */
final class InvalidMiddlewareExceptionTest extends TestCase
{
    public function testFromMiddlewareName()
    {
        $middlewareName = uniqid('middlewareName', true);
        $exception      = InvalidMiddlewareException::fromMiddlewareName($middlewareName);

        $this->assertInstanceOf(InvalidMiddlewareException::class, $exception);
        $this->assertSame('Cannot dispatch middleware ' . $middlewareName, $exception->getMessage());
        $this->assertSame($middlewareName, $exception->toMiddlewareName());
    }

    public function testToMiddlewareNameWhenNotSet()
    {
        $exception = new InvalidMiddlewareException();
        $this->assertSame('', $exception->toMiddlewareName());
    }

    public function testFromNull()
    {
        $exception = InvalidMiddlewareException::fromNull();

        $this->assertInstanceOf(InvalidMiddlewareException::class, $exception);
        $this->assertSame('Middleware name cannot be null', $exception->getMessage());
        $this->assertSame('', $exception->toMiddlewareName());
    }
}
