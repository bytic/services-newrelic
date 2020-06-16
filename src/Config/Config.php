<?php

namespace ByTIC\NewRelic\Config;

/**
 * Class Config
 * @package ByTIC\NewRelic\Config
 */
class Config
{
    use Traits\AutoInitTrait;
    use Traits\CanInitFromEnviromentTrait;
    use Traits\CanInitFromConfigTrait;

    /**
     * @var string
     */
    protected $appName;

    /**
     * @var string
     */
    protected $license;

    /**
     * @var bool
     */
    protected $captureParams = true;

    /**
     * @return string
     */
    public function getAppName()
    {
        return $this->appName;
    }

    /**
     * @param string $appName
     */
    public function setAppName(string $appName)
    {
        $this->appName = $appName;
    }

    /**
     * @return string
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param string $license
     */
    public function setLicense(string $license)
    {
        $this->license = $license;
    }

    /**
     * @return bool
     */
    public function isCaptureParams(): bool
    {
        return $this->captureParams;
    }

    /**
     * @param bool $captureParams
     */
    public function setCaptureParams(bool $captureParams)
    {
        $this->captureParams = $captureParams;
    }
}