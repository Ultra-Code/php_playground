<?php

declare(strict_types=1);

namespace Ultracode\Test\public;

use Ultracode\Test\Transaction;

require_once '../Transaction.php';

// phpinfo();

echo '<pre>';
// print_r($_SERVER);
// echo '<pre>';

$transaction = new Transaction(amount: 100.0, description: 'nginx rocks');
$transaction->addTax(8);
$transaction->applyDiscount(10);

debug_zval_dump($transaction);

$json = '{"a":1,"b":2}';
$json = json_decode($json);
print_r($json);

$new_class = new \stdClass();
$new_class->a = 1;
$new_class->{"object_access"} = 2;
var_export($new_class);

$array_obj = (object) [1, 2, 3];
print_r($array_obj);
debug_zval_dump($array_obj);
var_export($array_obj);
debug_zval_dump($array_obj);
debug_zval_dump($array_obj->{1});
