<?php

declare(strict_types=1);

namespace Playground;

class Rocky implements DebtCollector
{
    public function collect(float $amount_owed): float
    {
        $guaranteed = 0.65 * $amount_owed;
        return mt_rand((int)$guaranteed, (int)$amount_owed);
    }

    public function statusOfCollection(): bool
    {
        return false;
    }
}
