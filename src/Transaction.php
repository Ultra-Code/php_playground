<?php

declare(strict_types=1);

namespace Ultracode\Test;

/**
 * undocumented class
 */
class Transaction
{
    private float $amount;

    private string $description;

    public function __construct(float $amount, string $description)
    {
        $this->amount = $amount;
        $this->description = $description;
    }

    public function addTax(float $rate): void
    {
        $this->amount += ($this->amount * $rate) / 100;
    }

    public function applyDiscount(float $rate): void
    {
        $this->amount -= ($this->amount * $rate) / 100;
    }
    /**
     * @return void
     */
    public function __destruct()
    {
        echo 'No References, Destruct now '.$this->description.'<br/>';
    }
}
