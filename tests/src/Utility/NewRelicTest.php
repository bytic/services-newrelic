<?php

namespace ByTIC\NewRelic\Tests\Utility;

use ByTIC\NewRelic\Handler\DefaultHandler;
use ByTIC\NewRelic\NewRelicAgent;
use ByTIC\NewRelic\Tests\AbstractTest;
use ByTIC\NewRelic\Utility\NewRelic;
use Dotenv\Dotenv;
use Mockery;

/**
 * Class NewRelicTest
 * @package ByTIC\NewRelic\Tests\Utility
 */
class NewRelicTest extends AbstractTest
{
    public function test_init()
    {
        $handler = Mockery::mock(DefaultHandler::class);
        $handler->expects('handle')->with('newrelic_set_appname', ['MyApp', '99999']);
        $handler->expects('handle')->with('newrelic_capture_params', [true]);

        NewRelic::setAgent(new NewRelicAgent($handler));
        NewRelic::init('MyApp', '99999');

        static::assertSame('MyApp', NewRelic::getAppName());
        static::assertSame('99999', NewRelic::getLicence());
    }

    public function test_initFromEnviroment()
    {
        $handler = Mockery::mock(DefaultHandler::class);
        $handler->expects('handle')->with('newrelic_set_appname', ['MyApp ENV', '123456789']);
        $handler->expects('handle')->with('newrelic_capture_params', [true]);

        $dotenv = \Dotenv\Dotenv::createImmutable(TEST_FIXTURE_PATH, '.env.generic');
        $dotenv->load();

        NewRelic::setAgent(new NewRelicAgent($handler));
        NewRelic::initFromEnviroment();

        static::assertSame('MyApp ENV', NewRelic::getAppName());
        static::assertSame('123456789', NewRelic::getLicence());
    }
}
