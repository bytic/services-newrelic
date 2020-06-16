<?php

namespace ByTIC\NewRelic\Config\Traits;

use ByTIC\NewRelic\Config\Config;
use ByTIC\NewRelic\Config\ConfigEnv;

/**
 * Trait CanInitFromEnviromentTrait
 * @package ByTIC\NewRelic\Config\Traits
 */
trait CanInitFromEnviromentTrait
{

    /**
     * @return static|Config
     */
    public static function fromEnv()
    {
        $config = new static();
        $config->initFromEnv();
        return $config;
    }

    /**
     * @return bool
     */
    public static function canInitFromEnv()
    {
        if (empty(static::getEnvVar(ConfigEnv::APPLICATION_NAME))) {
            return false;
        }
        if (empty(static::getEnvVar(ConfigEnv::LICENSE))) {
            return false;
        }
        return true;
    }

    protected function initFromEnv()
    {
        $this->setAppName(static::getEnvVar(ConfigEnv::APPLICATION_NAME));
        $this->setLicense(static::getEnvVar(ConfigEnv::LICENSE));
    }

    /**
     * @param string $value
     * @param null $default
     * @return mixed|null
     */
    protected static function getEnvVar($value, $default = null)
    {
        if (isset($_ENV[$value])) {
            return $_ENV[$value];
        }
        return $default;
    }
}
