<?php

namespace ByTIC\NewRelic\Agent\Traits;

use ByTIC\NewRelic\Config\Config;

/**
 * Trait HasConfigTrait
 * @package ByTIC\NewRelic\Agent\Traits
 */
trait HasConfigTrait
{
    /**
     * @var Config
     */
    protected $config;

    /**
     * @param Config $config
     * @return static
     */
    public static function fromConfig($config)
    {
        $agent = new static();
        $agent->setConfig($config);
        return $agent;
    }

    /**
     * @param Config $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
        $this->populateFromConfig();
    }

    protected function populateFromConfig()
    {
        $licence = $this->config->getLicense();
        if ($licence) {
            $this->setLicence($licence);
        }

        $appName = $this->config->getAppName();
        if ($appName) {
            $this->setAppName($appName);
        }
        $this->captureParams($this->config->isCaptureParams());
    }
}