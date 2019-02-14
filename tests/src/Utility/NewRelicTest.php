<?php

namespace ByTIC\NewRelic\Tests\Utility;

use ByTIC\NewRelic\Handler\DefaultHandler;
use ByTIC\NewRelic\NewRelicAgent;
use ByTIC\NewRelic\Tests\AbstractTest;
use ByTIC\NewRelic\Utility\NewRelic;

/**
 * Class NewRelicTest
 * @package ByTIC\NewRelic\Tests\Utility
 */
class NewRelicTest extends AbstractTest
{
    public function testInit()
    {
        $handler = \Mockery::mock(DefaultHandler::class);
        $handler->expects('handle')->with('newrelic_set_appname', ['MyApp', '99999']);
        $handler->expects('handle')->with('newrelic_capture_params', [true]);

        NewRelic::setAgent(new NewRelicAgent($handler));
        NewRelic::init('MyApp', '99999');

        static::assertSame('MyApp', NewRelic::getAppName());
        static::assertSame('99999', NewRelic::getLicence());
    }
}
