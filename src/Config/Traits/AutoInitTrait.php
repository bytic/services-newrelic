<?php

namespace ByTIC\NewRelic\Config\Traits;

/**
 * Trait AutoInitTrait
 * @package ByTIC\NewRelic\Config\Traits
 */
trait AutoInitTrait
{
    /**
     * @return static
     */
    public static function autoInit()
    {
        if (static::canInitFromEnv()) {
            return static::fromEnv();
        }
        if (static::canInitFromConfig()) {
            return static::fromEnv();
        }
        return new static();
    }
}