<?php

declare(strict_types=1);

namespace Playground;

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

    //using constructor promotion syntax
    // public function __construct(private float $amount, private string $description)
    // {
    //     echo $amount;
    // }

    public function addTax(float $rate): void
    {
        $nullsafe = (string)null;
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
