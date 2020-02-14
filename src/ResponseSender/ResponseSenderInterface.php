<?php

/**
 * @see       https://github.com/laminas/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Laminas\Mvc\ResponseSender;

interface ResponseSenderInterface
{
    /**
     * Send the response
     *
     * @param SendResponseEvent $event
     * @return void
     */
    public function __invoke(SendResponseEvent $event);
}
