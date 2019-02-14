<?php

namespace ByTIC\NewRelic\Traits;

use Nip\Request;

/**
 * Trait HasTransactionsTrait
 * @package ByTIC\NewRelic\Traits
 */
trait HasTransactionsTrait
{

    /**
     * @param Request $request
     */
    public function nameTransactionFromRequest($request)
    {
        if (self::isLoaded()) {
            $name[] = $request->getModuleName();
            $name[] = $request->getControllerName();
            $name[] = $request->getActionName();
            self::nameTransaction(implode('/', $name));
        }
    }

    public function nameTransaction($name)
    {
        if (self::isLoaded()) {
            newrelic_name_transaction($name);
        }
    }
}
