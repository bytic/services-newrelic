<?php

namespace ByTIC\NewRelic\Handler;

/**
 * Class NullHandler
 * @package ByTIC\NewRelic\Handler
 */
class NullHandler implements Handler
{
    /**
     * @inheritDoc
     */
    public function handle($functionName, array $arguments = [])
    {
        return false;
    }
}
