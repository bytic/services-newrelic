<?php

namespace ByTIC\NewRelic\Handler;

/**
 * Interface Handler
 * @package ByTIC\NewRelic\Handler
 */
interface Handler
{
    /**
     * @param string $functionName
     * @param array $arguments
     *
     * @return mixed
     */
    public function handle($functionName, array $arguments = []);
}
