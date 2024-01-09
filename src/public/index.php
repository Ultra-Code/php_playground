<?php

declare(strict_types=1);

namespace Playground\public;

require __DIR__ . '/../vendor/autoload.php';

use Playground\Transaction as NormalTransaction;
use Ramsey\Uuid\UuidFactory;

// phpinfo();

echo '<pre>';
// print_r($_SERVER);
// echo '<pre>';
$transaction = new NormalTransaction(amount: 100.0, description: 'nginx rocks');
$uuid = new UuidFactory();
echo $uuid->uuid4() . '<br/>';
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
