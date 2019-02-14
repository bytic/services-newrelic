<?php

namespace ByTIC\Common\Utility;


/**
 * Class Newrelic
 * @package ByTIC\Common\Utility
 * @deprecated Use \ByTIC\NewRelic\Utility\NewRelic
 */
class Newrelic extends \ByTIC\NewRelic\Utility\NewRelic
{

    /**
     * @inheritDoc
     */
    public static function getAppname()
    {
        return parent::getAppName();
    }

    /**
     * @inheritDoc
     */
    public static function setAppname($name, $license = "")
    {
        return parent::getAppName();
    }

    public static function isLoaded()
    {

    }
}
