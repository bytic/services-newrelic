<?php

namespace ByTIC\NewRelic\Agent\Traits;

use Throwable;

/**
 * Trait CanCollectErrorsTrait
 * @package ByTIC\NewRelic\Agent\Traits
 */
trait CanCollectErrorsTrait
{
    /**
     * @param string $message
     * @return mixed
     */
    public function sendErrorMessage(string $message)
    {
        return $this->call('newrelic_notice_error', [$message]);
    }

    /**
     * @param Throwable $e
     * @return mixed
     */
    public function sendThrowable(Throwable $e)
    {
        return $this->call('newrelic_notice_error', [$e]);
    }

    /**
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @param string $errcontext
     * @return mixed
     */
    public function sendErrorWithContext(int $errno, string $errstr, string $errfile, int $errline, string $errcontext)
    {
        return $this->call('newrelic_notice_error', [$errno, $errstr, $errfile, $errline, $errcontext]);
    }
}