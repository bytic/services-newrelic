<?php

namespace ByTIC\NewRelic\Agent\Traits;

/**
 * Trait HasAppNameTrait
 * @package ByTIC\NewRelic\Agent\Traits
 */
trait HasAppNameTrait
{
    protected $name;

    /**
     * Get the App Name
     *
     * @return string
     */
    public function getAppName()
    {
        return $this->name;
    }

    /**
     * Set the App Name
     *
     * @param $name
     * @param string $license
     * @return
     */
    public function setAppName($name, $license = "")
    {
        $this->name = $name;
        return $this->callWithLicence('newrelic_set_appname', $license, $name);
    }
}
