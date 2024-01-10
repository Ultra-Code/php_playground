<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

echo '<pre>';

// phpinfo();

// print_r($_SERVER);
// echo '<pre>';

$service = new \Playground\DebtCollectionService();
$service->collectDebt(new \Playground\Rocky());
