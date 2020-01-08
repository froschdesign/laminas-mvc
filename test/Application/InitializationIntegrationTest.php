<?php

/**
 * @see       https://github.com/laminasframwork/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminasframwork/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminasframwork/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\Application;

use Laminas\Mvc\Application;
use Laminas\Mvc\MvcEvent;
use PHPUnit\Framework\TestCase;

use function ob_get_clean;
use function ob_start;

/**
 * @coversNothing
 */
class InitializationIntegrationTest extends TestCase
{
    public function testDefaultInitializationWorkflow()
    {
        $appConfig = [
            'modules'                 => [
                'Laminas\Router',
                'Application',
            ],
            'module_listener_options' => [
                'module_paths' => [
                    __DIR__ . '/TestAsset/modules',
                ],
            ],
        ];

        $application = Application::init($appConfig);

        $request = $application->getRequest();
        $request->setUri('http://example.local/path');
        $request->setRequestUri('/path');

        ob_start();
        $application->run();
        $content = ob_get_clean();

        $response = $application->getResponse();
        $this->assertStringContainsString('Application\\Controller\\PathController', $response->getContent());
        $this->assertStringContainsString('Application\\Controller\\PathController', $content);
        $this->assertStringContainsString(MvcEvent::EVENT_DISPATCH, $response->toString());
    }
}
