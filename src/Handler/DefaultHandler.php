<?php

namespace ByTIC\NewRelic\Handler;

/**
 * Class DefaultHandler
 * @package ByTIC\NewRelic\Handler
 */
class DefaultHandler implements Handler
{
    /**
     * @param string $functionName
     * @param array $arguments
     * @return mixed
     */
    public function handle($functionName, array $arguments = [])
    {
        return call_user_func_array($functionName, $arguments);
    }
}
