<?php

namespace Playground;

use IteratorAggregate;

/**
 * @implements IteratorAggregate<int,int>
 */
class InvoiceCollectionArrayAggregator implements \IteratorAggregate
{
    /** @param int[] $invoices */
    public function __construct(private array  $invoices)
    {
    }

    #[\Override]
    public function getIterator(): \Iterator
    {
        return new \ArrayIterator($this->invoices);
    }
}
