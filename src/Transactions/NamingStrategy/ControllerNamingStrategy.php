<?php

namespace ByTIC\NewRelic\Transactions\NamingStrategy;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class ControllerNamingStrategy
 * @package ByTIC\NewRelic\Transactions\NamingStrategy
 */
class ControllerNamingStrategy
{
    /**
     * @param RequestInterface $request
     * @return string
     */
    public static function getTransactionName(ServerRequestInterface $request)
    {
        if (method_exists($request, 'getModuleName')
            && method_exists($request, 'getControllerName')
            && method_exists($request, 'getActionName')) {
            $name = [
                $request->getModuleName(),
                $request->getControllerName(),
                $request->getActionName(),
            ];

            return implode('/', $name);
        }
        $controller = $request->getAttribute('_controller');
        if (empty($controller)) {
            return 'Unknown controller';
        }
        if (\is_object($controller)) {
            return 'Callback controller: '.\get_class($controller);
        }
    }
}
