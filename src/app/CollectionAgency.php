<?php

declare(strict_types=1);

namespace Playground;

class CollectionAgency implements DebtCollector
{
    function collect(float $amount_owed): float
    {
        $guaranteed = (1 / 2) * $amount_owed;
        return mt_rand((int)$guaranteed, (int)$amount_owed);
    }

    function statusOfCollection(): bool
    {
        return true;
    }
}
