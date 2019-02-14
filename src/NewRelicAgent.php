<?php

namespace ByTIC\NewRelic;

use ByTIC\NewRelic\Handler\Handler;
use ByTIC\NewRelic\Traits\HasAppNameTrait;
use ByTIC\NewRelic\Traits\HasHandlerTrait;
use ByTIC\NewRelic\Traits\HasLicenseTrait;
use ByTIC\NewRelic\Traits\HasParamsTrait;
use ByTIC\NewRelic\Traits\HasTransactionsTrait;
use ByTIC\NewRelic\Traits\InstalledTrait;

/**
 * Class NewRelicAgent
 * @package ByTIC\NewRelic
 */
class NewRelicAgent
{
    use HasAppNameTrait;
    use HasHandlerTrait;
    use HasLicenseTrait;
    use HasParamsTrait;
    use HasTransactionsTrait;
    use InstalledTrait;

    /**
     * Allows pass-through if NewRelic is not installed (default) or optionally throws a runtime exception is the
     * NewRelic PHP agent methods are not found.
     *
     * @param bool $throw
     * @param Handler $handler
     *
     * @throws \RuntimeException
     */
    public function __construct(Handler $handler = null, $throw = false)
    {
        $this->bootInstalled();
        if ($throw && !$this->isInstalled()) {
            throw new \RuntimeException('NewRelic PHP Agent does not appear to be installed');
        }
        $this->bootHandler($handler);
    }

    /**
     * @param $name
     * @param $licence
     */
    public static function init($name, $licence)
    {
        if (self::isLoaded()) {
            self::setAppname($name, $licence);
            newrelic_capture_params();
        }
    }
}
