<?php

/**
 * @see       https://github.com/laminasframwork/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminasframwork/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminasframwork/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Mvc\Exception;

class ReachedFinalHandlerException extends RuntimeException
{
    /**
     * @return self
     */
    public static function create()
    {
        return new self('Reached the final handler for middleware pipe - check the pipe configuration');
    }
}
