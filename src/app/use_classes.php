<?php

declare(strict_types=1);

namespace Playground;

use Playground\Transaction as NormalTransaction;
use Ramsey\Uuid\UuidFactory;

class use_classes
{
    public function __invoke(): void
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

        $service = new \Playground\DebtCollectionService();
        $serialized_service = serialize($service);
        debug_zval_dump($serialized_service);
        /** @var \Playground\DebtCollectionService $deserialized_service */
        $deserialized_service =  unserialize($serialized_service);
        debug_zval_dump($deserialized_service);
        $deserialized_service->collectDebt(new \Playground\Rocky());
        // $service->collectDebt(new \Playground\Rocky());
    }

    public function use_iterators(): void
    {
        $period = new \DatePeriod(new \DateTime("05/01/2021"), new \DateInterval('P1D'), new \DateTime("05/31/2021"));
        debug_zval_dump($period);

        foreach ($period  as $date) {
            echo $date->format("d/m/y") . PHP_EOL;
        }

        $invoices = new \Playground\InvoiceCollection([3,6,9,7]);
        foreach ($invoices  as $key => $value) {
            echo $key . ' = ' . $value . PHP_EOL;
        }


        $invoices = new \Playground\InvoiceCollectionArrayIterator([3,6,9,7]);
        foreach ($invoices  as $index => $value) {
            echo $index . ' = ' . $value . PHP_EOL;
        }
    }
}
