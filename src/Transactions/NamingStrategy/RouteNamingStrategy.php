<?php

namespace ByTIC\NewRelic\Transactions\NamingStrategy;

use Psr\Http\Message\RequestInterface;

/**
 * Class RouteNamingStrategy
 * @package ByTIC\NewRelic\Transactions\NamingStrategy
 */
class RouteNamingStrategy
{
    /**
     * @param RequestInterface $request
     * @return string
     */
    public static function getTransactionName(RequestInterface $request)
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $request->getAttribute('_route') ?: 'Unknown route';
    }
}
