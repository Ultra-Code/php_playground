<?php

declare(strict_types=1);

namespace Playground;

use Iterator;


/**
* @implements Iterator<int,int>
 */
class InvoiceCollection implements \Iterator
{
    private int $index = 0;

    /** @param int[] $invoices */
    public function __construct(private array  $invoices)
    {
    }

    public function current(): int
    {
        echo __METHOD__ . PHP_EOL;
        // return (int)\current($this->invoices);
        return   $this->invoices[$this->index];

    }

    public function next(): void
    {
        echo __METHOD__ . PHP_EOL;
        // \next($this->invoices);
        $this->index += 1;
    }

    public function key(): int
    {
        echo __METHOD__ . PHP_EOL;
        // return (int)\key($this->invoices);
        return $this->index;
    }

    public function valid(): bool
    {
        echo __METHOD__ . PHP_EOL;
        // return \current($this->invoices) !== false;
        return isset($this->invoices[$this->index]);
    }

    public function rewind(): void
    {
        echo __METHOD__ . PHP_EOL;
        // \reset($this->invoices);
        $this->index = 0;
    }
}

