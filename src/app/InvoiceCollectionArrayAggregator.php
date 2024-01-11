<?php

namespace Playground;

use IteratorAggregate;
use Traversable;

/**
 * @implements IteratorAggregate<int,int>
 */
class InvoiceCollectionArrayIterator implements \IteratorAggregate
{
    /** @param int[] $invoices */
    public function __construct(private array  $invoices)
    {
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->invoices);
    }
}
