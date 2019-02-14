<?php

namespace ByTIC\NewRelic\Traits;

/**
 * Trait HasParamsTrait
 * @package ByTIC\NewRelic\Traits
 */
trait HasParamsTrait
{
    /**
     * @param bool $enable
     * @return mixed
     */
    public function captureParams($enable = true)
    {
        return $this->call('newrelic_capture_params', [$enable]);
    }
}
