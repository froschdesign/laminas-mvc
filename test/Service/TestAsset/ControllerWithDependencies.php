<?php

/**
 * @see       https://github.com/laminas/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\Service\TestAsset;

use stdClass;
use Laminas\Stdlib\DispatchableInterface;
use Laminas\Stdlib\RequestInterface;
use Laminas\Stdlib\ResponseInterface;

class ControllerWithDependencies implements DispatchableInterface
{
    /** @var stdClass */
    public $injectedValue;

    /**
     * @param stdClass $injected
     */
    public function setInjectedValue(stdClass $injected)
    {
        $this->injectedValue = $injected;
    }

    public function dispatch(RequestInterface $request, ?ResponseInterface $response = null)
    {
    }
}
