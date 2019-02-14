<?php

namespace ByTIC\NewRelic\Utility;

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
        static::getAgent()->captureParams();
    }

    /**
     * @param null $handler
     * @return null|NewRelicAgent
     */
    protected static function getAgent($handler = null)
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
     * @param null $agent
     */
    public static function setAgent($agent)
    {
        self::$agent = $agent;
    }
}
