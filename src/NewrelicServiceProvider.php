<?php

namespace ByTIC\NewRelic;

use ByTIC\NewRelic\Utility\NewRelic;
use Nip\Container\ServiceProviders\Providers\AbstractServiceProvider;
use Nip\Container\ServiceProviders\Providers\BootableServiceProviderInterface;
use Nip\Http\Kernel\Kernel;
use Nip\Http\Kernel\KernelInterface;
use Nip\NewRelic\Middleware\NewRelicMiddleware;

/**
 * Class NewrelicServiceProvider
 * @package ByTIC\NewRelic
 */
class NewrelicServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{

    /**
     * Returns a boolean if checking whether this provider provides a specific
     * service or returns an array of provided services if no argument passed.
     *
     * @return array
     */
    public function provides()
    {
        return ['newrelic', 'newrelic.middleware'];
    }

    public function boot()
    {
        $this->bootMiddleware();
    }

    public function register()
    {
        $this->registerAgent();
    }

    protected function registerAgent()
    {
        $this->getContainer()->share(
            'newrelic',
            function () {
                $agent = NewRelic::getAgent();
                return $agent;
            }
        );
    }

    protected function registerMiddleware()
    {
        $this->getContainer()->share(
            'newrelic.middleware',
            function () {
                $agent = $this->getContainer()->get('newrelic');

                return new NewRelicMiddleware($agent);
            }
        );
    }

    /**
     * Boot the Newrelic Middleware
     */
    protected function bootMiddleware()
    {
        /** @var Kernel $kernel */
        $kernel = $this->getContainer()->get(KernelInterface::class);
        $kernel->prependMiddleware($this->getContainer()->get('newrelic.middleware'));
    }
}