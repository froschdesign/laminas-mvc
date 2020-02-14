<?php

/**
 * @see       https://github.com/laminas/laminas-mvc for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace LaminasTest\Mvc\ResponseSender;

use Laminas\Http\PhpEnvironment\Response;
use Laminas\Mvc\ResponseSender\PhpEnvironmentResponseSender;
use Laminas\Mvc\ResponseSender\SendResponseEvent;
use Laminas\Stdlib\ResponseInterface;
use PHPUnit\Framework\TestCase;

use function ob_get_clean;
use function ob_start;

/**
 * @covers \Laminas\Mvc\ResponseSender\PhpEnvironmentResponseSender
 */
class PhpEnvironmentResponseSenderTest extends TestCase
{
    public function testSendResponseIgnoresInvalidResponseTypes()
    {
        $mockResponse          = $this->getMockForAbstractClass(ResponseInterface::class);
        $mockSendResponseEvent = $this->getSendResponseEventMock();
        $mockSendResponseEvent->expects($this->any())->method('getResponse')->will($this->returnValue($mockResponse));
        $responseSender = new PhpEnvironmentResponseSender();
        ob_start();
        $responseSender($mockSendResponseEvent);
        $body = ob_get_clean();
        $this->assertEquals('', $body);
    }

    public function testSendResponseTwoTimesPrintsResponseOnlyOnce()
    {
        $mockResponse = $this->createMock(Response::class);
        $mockResponse->expects($this->any())->method('getContent')->will($this->returnValue('body'));
        $mockSendResponseEvent = $this->getSendResponseEventMock();
        $mockSendResponseEvent->expects($this->any())->method('getResponse')->will($this->returnValue($mockResponse));
        $mockSendResponseEvent->expects($this->once())->method('setContentSent');
        $responseSender = new PhpEnvironmentResponseSender();
        ob_start();
        $responseSender($mockSendResponseEvent);
        $body = ob_get_clean();
        $this->assertEquals('body', $body);

        ob_start();
        $responseSender($mockSendResponseEvent);
        $body = ob_get_clean();
        $this->assertEquals('', $body);
    }

    protected function getSendResponseEventMock()
    {
        $returnValue           = false;
        $mockSendResponseEvent = $this->getMockBuilder(SendResponseEvent::class)
            ->setMethods(['getResponse', 'contentSent', 'setContentSent'])
            ->getMock();

        $mockSendResponseEvent->expects($this->any())
            ->method('contentSent')
            ->will($this->returnCallback(function () use (&$returnValue) {
                if (false === $returnValue) {
                    $returnValue = true;
                    return false;
                }
                return true;
            }));
        return $mockSendResponseEvent;
    }
}
