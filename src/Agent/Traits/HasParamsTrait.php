<?php

namespace ByTIC\NewRelic\Agent\Traits;

/**
 * Trait HasParamsTrait
 * @package ByTIC\NewRelic\Agent\Traits
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
