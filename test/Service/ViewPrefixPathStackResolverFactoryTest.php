<?php

/**
 * @see       https://github.com/laminas/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\Service;

use Interop\Container\ContainerInterface;
use Laminas\Mvc\Service\ViewPrefixPathStackResolverFactory;
use Laminas\ServiceManager\ServiceLocatorInterface;
use Laminas\View\Resolver\PrefixPathStackResolver;
use PHPUnit\Framework\TestCase;

class ViewPrefixPathStackResolverFactoryTest extends TestCase
{
    public function testCreateService()
    {
        $serviceLocator = $this->prophesize(ServiceLocatorInterface::class);
        $serviceLocator->willImplement(ContainerInterface::class);

        $serviceLocator->get('config')->willReturn([
            'view_manager' => [
                'prefix_template_path_stack' => [
                    'album/' => [],
                ],
            ],
        ]);

        $factory  = new ViewPrefixPathStackResolverFactory();
        $resolver = $factory($serviceLocator->reveal(), 'ViewPrefixPathStackResolver');

        $this->assertInstanceOf(PrefixPathStackResolver::class, $resolver);
    }
}
