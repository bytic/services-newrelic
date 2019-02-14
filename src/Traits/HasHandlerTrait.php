<?php

namespace ByTIC\NewRelic\Traits;

use ByTIC\NewRelic\Handler\DefaultHandler;
use ByTIC\NewRelic\Handler\Handler;
use ByTIC\NewRelic\Handler\NullHandler;

/**
 * Trait HasHandlerTrait
 * @package ByTIC\NewRelic\Traits
 */
trait HasHandlerTrait
{
    /**
     * @var Handler
     */
    protected $handler;

    /**
     * @param Handler $handler
     */
    protected function bootHandler($handler = null)
    {
        if ($handler === null) {
            $handler = $this->isInstalled() ? new DefaultHandler() : new NullHandler();
        }

        $this->handler = $handler;
    }

    /**
     * @param $method
     * @param array $params
     * @return mixed
     */
    protected function call($method, array $params = [])
    {
        return $this->handler->handle($method, $params);
    }
}
