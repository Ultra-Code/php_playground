<?php

namespace Playground;

class DebtCollectionService
{
    public function collectDebt(DebtCollector  $collector): void
    {
        debug_zval_dump($collector instanceof CollectionAgency);
        $amountOwed = mt_rand(30, 100);
        $amount_collected = $collector->collect(amount_owed:$amountOwed);

        echo "collected $ " . $amount_collected . " out of ". $amountOwed . PHP_EOL;
    }
}
