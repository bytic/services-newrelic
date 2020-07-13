<?php

namespace ByTIC\NewRelic\Utility;

use ByTIC\NewRelic\NewRelicAgent;

/**
 * Trait HasNewRelicAgent
 * @package ByTIC\NewRelic\Utility
 * @internal
 */
trait HasNewRelicAgent
{

    /**
     * The NewRelicAgent instance
     *
     * @var NewRelicAgent
     */
    protected $newRelicAgent = null;

    /**
     * @return NewRelicAgent
     */
    public function getNewRelicAgent(): NewRelicAgent
    {
        if ($this->newRelicAgent === null) {
            $this->setNewRelicAgent(NewRelic::getAgent());
        }
        return $this->newRelicAgent;
    }

    /**
     * @param NewRelicAgent $newRelicAgent
     */
    public function setNewRelicAgent(NewRelicAgent $newRelicAgent)
    {
        $this->newRelicAgent = $newRelicAgent;
    }
}