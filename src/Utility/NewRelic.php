<?php

namespace ByTIC\NewRelic\Utility;

use ByTIC\NewRelic\Config\Config;
use ByTIC\NewRelic\NewRelicAgent;

/**
 * Class NewRelic
 * @package ByTIC\NewRelic\Utility
 *
 * @method string getLicence()
 * @method string getAppName()
 */
class NewRelic
{
    /**
     * @var null|NewRelicAgent
     */
    protected static $agent = null;

    protected static $config = null;

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($method, $arguments)
    {
        return call_user_func_array([static::getAgent(), $method], $arguments);
    }

    /**
     * @param $name
     * @param null $licence
     */
    public static function init($name, $licence = null)
    {
        static::getAgent()->setLicence($licence);
        static::getAgent()->setAppName($name);
    }

    /**
     * @param null $handler
     * @return null|NewRelicAgent
     */
    public static function getAgent($handler = null)
    {
        if (self::$agent === null) {
            static::initAgent($handler);
        }

        return self::$agent;
    }

    /**
     * @param $handler
     */
    protected static function initAgent($handler)
    {
        self::setAgent(new NewRelicAgent($handler));
    }


    /**
     * @param NewRelicAgent $agent
     */
    public static function setAgent($agent)
    {
        if ($agent) {
            $agent->setConfig(static::getConfig());
        }
        self::$agent = $agent;
    }

    /**
     * @return Config
     */
    protected static function getConfig()
    {
        if (self::$config === null) {
            self::$config = Config::autoInit();
        }

        return self::$config;
    }

    /**
     * @param $config
     */
    public static function setConfig($config)
    {
        self::$config = $config;
    }
}
