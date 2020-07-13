<?php

namespace ByTIC\NewRelic;

use ByTIC\NewRelic\Handler\Handler;

/**
 * Class NewRelicAgent
 * @package ByTIC\NewRelic
 */
class NewRelicAgent
{
    use Agent\Traits\CanCollectErrorsTrait;
    use Agent\Traits\HasAppNameTrait;
    use Agent\Traits\HasConfigTrait;
    use Agent\Traits\HasHandlerTrait;
    use Agent\Traits\HasLicenseTrait;
    use Agent\Traits\HasParamsTrait;
    use Agent\Traits\HasTransactionsTrait;
    use Agent\Traits\InstalledTrait;

    /**
     * Allows pass-through if NewRelic is not installed (default) or optionally throws a runtime exception is the
     * NewRelic PHP agent methods are not found.
     *
     * @param bool $throw
     * @param Handler $handler
     *
     * @throws \RuntimeException
     */
    public function __construct(Handler $handler = null, $throw = false)
    {
        $this->bootInstalled();
        if ($throw && !$this->isInstalled()) {
            throw new \RuntimeException('NewRelic PHP Agent does not appear to be installed');
        }
        $this->bootHandler($handler);
    }
}
