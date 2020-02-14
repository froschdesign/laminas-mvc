<?php

/**
 * @see       https://github.com/laminas/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

use Error;
use Exception;
use Laminas\Mvc\Controller\AbstractActionController;

class BadController extends AbstractActionController
{
    public function testAction()
    {
        throw new Exception('Raised an exception');
    }

    public function testPhp7ErrorAction()
    {
        throw new Error('Raised an error');
    }
}
