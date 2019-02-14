<?php

namespace ByTIC\NewRelic\Traits;

/**
 * Trait InstalledTrait
 * @package ByTIC\NewRelic\Traits
 */
trait InstalledTrait
{
    /**
     * @var bool
     */
    protected $installed;

    protected function bootInstalled()
    {
        $this->installed = $this->validateInstalled();
    }

    /**
     * @return bool
     */
    public function isInstalled()
    {
        return $this->installed;
    }

    /**
     * @return bool
     */
    protected function validateInstalled()
    {
        return extension_loaded('newrelic') && function_exists('newrelic_set_appname');
    }
}
