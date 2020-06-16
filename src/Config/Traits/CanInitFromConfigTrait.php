<?php

namespace ByTIC\NewRelic\Config\Traits;

use ByTIC\NewRelic\Config\Config;
use ByTIC\NewRelic\Config\ConfigConfig;

/**
 * Trait CanInitFromConfigTrait
 * @package ByTIC\NewRelic\Config\Traits
 */
trait CanInitFromConfigTrait
{

    /**
     * @return static|Config
     */
    public static function fromConfig()
    {
        $config = new static();
        $config->initFromConfig();
        return $config;
    }

    /**
     * @return bool
     */
    public static function canInitFromConfig()
    {
        if (!function_exists('config') || function_exists('app')) {
            return false;
        }
        return true;
    }

    protected function initFromConfig()
    {
    }

    /**
     * @param string $value
     * @param null $default
     * @return mixed|null
     */
    protected static function getConfigVar($value, $default = null)
    {
    }
}
