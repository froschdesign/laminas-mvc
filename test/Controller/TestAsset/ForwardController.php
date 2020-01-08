<?php

/**
 * @see       https://github.com/laminasframwork/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminasframwork/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminasframwork/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\Controller\TestAsset;

use Laminas\Mvc\Controller\AbstractActionController;

class ForwardController extends AbstractActionController
{
    public function testAction()
    {
        return ['content' => __METHOD__];
    }

    public function testMatchesAction()
    {
        $e = $this->getEvent();
        return $e->getRouteMatch()->getParams();
    }

    public function notFoundAction()
    {
        return [
            'status' => 'not-found',
            'params' => $this->params()->fromRoute(),
        ];
    }
}
