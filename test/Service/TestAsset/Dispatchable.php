<?php

/**
 * @see       https://github.com/laminas/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\Service\TestAsset;

use Laminas\Mvc\Controller\AbstractActionController;

class Dispatchable extends AbstractActionController
{
    /**
     * Override, so we can test injection
     */
    public function getEventManager()
    {
        return $this->events;
    }
}
