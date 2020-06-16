<?php

namespace ByTIC\NewRelic\Tests;

use ByTIC\NewRelic\Utility\NewRelic;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest
 * @package ByTIC\NewRelic\Tests
 */
abstract class AbstractTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        NewRelic::setConfig(null);
        NewRelic::setAgent(null);
    }
}
