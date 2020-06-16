<?php

namespace Nip\NewRelic\Middleware;

use ByTIC\NewRelic\NewRelicAgent;
use Nip\DebugBar\DebugBar;
use Nip\Http\ServerMiddleware\Middlewares\ServerMiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Class NewRelicMiddleware
 * @package Nip\NewRelic\Middleware
 */
class NewRelicMiddleware implements ServerMiddlewareInterface
{
    /**
     * The NewRelicAgent instance
     *
     * @var NewRelicAgent
     */
    protected $newRelicAgent;

    /**
     * Create a new session middleware.
     *
     * @param NewRelicAgent $newRelicAgent
     */
    public function __construct(NewRelicAgent $newRelicAgent)
    {
        $this->newRelicAgent = $newRelicAgent;
    }

    /**
     * @inheritdoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);
        $this->newRelicAgent->nameTransactionFromRequest($request);
        return $response;
    }
}
