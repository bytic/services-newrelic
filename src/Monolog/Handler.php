<?php

namespace ByTIC\NewRelic\Monolog;

use ByTIC\NewRelic\Utility\HasNewRelicAgent;
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\NormalizerFormatter;
use Monolog\Handler\AbstractProcessingHandler;

/**
 * Class Handler
 * @package ByTIC\NewRelic\Monolog
 */
class Handler extends AbstractProcessingHandler
{
    use HasNewRelicAgent;

    protected function write(array $record): void
    {
        if (!$this->getNewRelicAgent()->isInstalled()) {
            return;
        }

        $this->sendToAgent($record);
    }

    /**
     * @param array $record
     */
    protected function sendToAgent(array $record)
    {
        if (isset($record['context']['exception']) && $record['context']['exception'] instanceof \Throwable) {
            $this->getNewRelicAgent()->sendThrowable($record['context']['exception']);
            return;
        }
        if (is_string($record['formatted'])) {
            $this->getNewRelicAgent()->sendErrorMessage($record['formatted']);
            return;
        }

        $this->getNewRelicAgent()->sendErrorMessage($record['message']);
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new NormalizerFormatter();
    }
}
