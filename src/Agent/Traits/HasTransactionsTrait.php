<?php

namespace ByTIC\NewRelic\Agent\Traits;

use ByTIC\NewRelic\Transactions\NamingStrategy\ControllerNamingStrategy;
use Nip\Request;
use Psr\Http\Message\RequestInterface;

/**
 * Trait HasTransactionsTrait
 * @package ByTIC\NewRelic\Agent\Traits
 */
trait HasTransactionsTrait
{
    /**
     * @param $name
     * @return mixed
     */
    public function nameTransaction($name)
    {
        return $this->call('newrelic_name_transaction', [$name]);
    }

    /**
     * If you have ended a transaction before your script terminates (perhaps due to it just having finished a task in a
     * job queue manager) and you want to start a new transaction, use this call. This will perform the same operations
     * that occur when the script was first started. Of the two arguments, only the application name is mandatory.
     * However, if you are processing tasks for multiple accounts, you may also provide a license for the associated
     * account. The license set for this API call will supersede all per-directory and global default licenses
     * configured in INI files.
     *
     * @param string $name
     * @param string $license
     *
     * @return mixed
     */
    public function startTransaction($name, $license = "")
    {
        return $this->call('newrelic_start_transaction', [$name, $license]);
    }

    /**
     * Do not generate metrics for this transaction. This is useful when you have transactions that are particularly
     * slow for known reasons and you do not want them always being reported as the transaction trace or skewing your
     * site averages.
     *
     * @return mixed
     */
    public function ignoreTransaction()
    {
        return $this->call('newrelic_ignore_transaction');
    }

    /**
     * @return mixed
     */
    public function endOfTransaction()
    {
        return $this->call('newrelic_end_of_transaction');
    }

    /**
     * Despite being similar in name to newrelic_end_of_transaction above, this call serves a very different purpose.
     * newrelic_end_of_transaction simply marks the end time of the transaction but takes no other action. The
     * transaction is still only sent to the daemon when the PHP engine determines that the script is done executing and
     * is shutting down. This function on the other hand, causes the current transaction to end immediately, and will
     * ship all of the metrics gathered thus far to the daemon unless the ignore parameter is set to true. In effect
     * this call simulates what would happen when PHP terminates the current transaction. This is most commonly used in
     * command line scripts that do some form of job queue processing. You would use this call at the end of processing
     * a single job task, and begin a new transaction (see below) when a new task is pulled off the queue.
     *
     * Normally, when you end a transaction you want the metrics that have been gathered thus far to be recorded.
     * However, there are times when you may want to end a transaction without doing so. In this case use the second
     * form of the function and set ignore to true.
     *
     * @param bool $ignore
     * @return mixed
     */
    public function endTransaction($ignore = false)
    {
        return $this->call('newrelic_end_transaction', [$ignore]);
    }

    /**
     * @param RequestInterface $request
     */
    public function nameTransactionFromRequest($request)
    {
        $this->nameTransaction(
            ControllerNamingStrategy::getTransactionName($request)
        );
    }
}
