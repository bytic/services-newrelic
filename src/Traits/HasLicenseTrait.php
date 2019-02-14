<?php

namespace ByTIC\NewRelic\Traits;

/**
 * Trait HasLicenseTrait
 * @package ByTIC\NewRelic\Traits
 */
trait HasLicenseTrait
{
    protected $licence;

    /**
     * Get Licence key
     *
     * @return string
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * @param mixed $licence
     */
    public function setLicence($licence)
    {
        $this->licence = $licence;
    }

    /**
     * @param $method
     * @param null $licence
     * @param array $params
     * @return mixed
     */
    public function callWithLicence($method, $licence = null, $params = [])
    {
        if (!is_array($params)) {
            $params = [$params];
        }
        if ($licence) {
            $this->setLicence($licence);
        } else {
            $licence = $this->getLicence();
        }
        $params[] = $licence;

        return $this->call($method, $params);
    }
}
