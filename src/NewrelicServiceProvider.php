<?php

namespace ByTIC\NewRelic;

use ByTIC\NewRelic\Utility\NewRelic;
use Nip\Container\ServiceProviders\Providers\AbstractServiceProvider;

/**
 * Class NewrelicServiceProvider
 * @package ByTIC\NewRelic
 */
class NewrelicServiceProvider extends AbstractServiceProvider
{

    /**
     * Returns a boolean if checking whether this provider provides a specific
     * service or returns an array of provided services if no argument passed.
     *
     * @return array
     */
    public function provides()
    {
        return ['newrelic'];
    }

    public function register()
    {
        $this->getContainer()->share(
            'newrelic',
            function () {
                $agent = NewRelic::getAgent();
                return $agent;
            }
        );
    }
}