<?php

/**
 * @see       https://github.com/laminas/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

use Laminas\Http\Request as HttpRequest;

use function strtoupper;

/**
 * @copyright Copyright (c) 2005-2015 Laminas (https://www.zend.com)
 * @license   https://getlaminas.org/license/new-bsd New BSD License
 */
class Request extends HttpRequest
{
    /**
     * Override the method setter, to allow arbitrary HTTP methods
     *
     * @param  string $method
     * @return Request
     */
    public function setMethod($method)
    {
        $method       = strtoupper($method);
        $this->method = $method;
        return $this;
    }
}
