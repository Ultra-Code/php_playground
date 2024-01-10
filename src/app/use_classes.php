<?php

declare(strict_types=1);

namespace Playground;

use Playground\Transaction as NormalTransaction;
use Ramsey\Uuid\UuidFactory;

class use_classes
{
    public function use_classes(): void
    {
        $uuid = new UuidFactory();
        echo $uuid->uuid4() . '<br/>';
        $transaction = new NormalTransaction(amount: 100.0, description: 'nginx rocks');
        echo NormalTransaction::PAID_STATUS . '<br/>';
        echo $transaction::PAID_STATUS . '<br/>';
        $transaction = new NormalTransaction(amount: 100.0, description: 'nginx rocks');
        echo "instance count is " . NormalTransaction::$instance_count . '<br/>';
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
    }

    public function use_inheritance(): void
    {
        $fields = [
            new \Playground\Text("textname"),
            new \Playground\Checkbox("checkboxname"),
            new \Playground\Radio("radioname"),
        ];

        foreach ($fields  as $index => $field) {
            echo $field->render() . " at index {$index} " . PHP_EOL;
        }
    }
}
