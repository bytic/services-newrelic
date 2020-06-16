<?php

namespace ByTIC\NewRelic\Transactions\NamingStrategy;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface TransactionNamingStrategyInterface
 * @package ByTIC\NewRelic\Transactions\NamingStrategy
 */
interface TransactionNamingStrategyInterface
{
    public function getTransactionName(Request $request): string;
}
