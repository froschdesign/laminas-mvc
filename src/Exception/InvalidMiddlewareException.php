<?php

/**
 * @see       https://github.com/laminasframwork/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminasframwork/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminasframwork/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Mvc\Exception;

use function sprintf;

final class InvalidMiddlewareException extends RuntimeException
{
    /** @var string */
    private $middlewareName;

    /**
     * @param string $middlewareName
     * @return self
     */
    public static function fromMiddlewareName($middlewareName)
    {
        $middlewareName           = (string) $middlewareName;
        $instance                 = new self(sprintf('Cannot dispatch middleware %s', $middlewareName));
        $instance->middlewareName = $middlewareName;
        return $instance;
    }

    public static function fromNull()
    {
        return new self('Middleware name cannot be null');
    }

    /**
     * @return string
     */
    public function toMiddlewareName()
    {
        return null !== $this->middlewareName ? $this->middlewareName : '';
    }
}
