<?php

namespace ByTIC\NewRelic\Utility;

/**
 * Class InitFromEnviroment
 * @package ByTIC\NewRelic\Utility
 */
class InitFromEnviroment
{
    public static function init()
    {
        static::initApplicationLicenceKey();
    }

    protected static function initApplicationLicenceKey()
    {
        $key = getenv('NEWRELIC_LICENSE_KEY', '');
        $appName = getenv('NEWRELIC_APPLICATION_NAME', '');
        NewRelic::init($appName, $key);
    }
}
