<?php

declare(strict_types=1);

namespace Playground;

use ArrayObject;

class php8
{
    /** @param string $cannot_modify is a readonly type */
    /* @param $some_type is an intersection type */
    /* @param $type uses new initializer on construction */

    //
    public function __construct(
        public readonly string $cannot_modify,
        protected $type = new ArrayObject(),
        // private readonly \Iterator&\ArrayAccess $some_type,
    ) {}

    // php now has final constants in classes

    public function overwrite(): void
    {
        print ($this->cannot_modify);
        // get_class()
    }

    public function array_spread_with_string_key(): void
    {
        $array1 = ['a' => 1, 2, 3];
        $array2 = [4, 5, 6];
        $array3 = [...$array1, ...$array2];

        print_r($array3);
    }

    public function never_type(): never
    {
        // this throws and exception or exits
        // which stops normal flow of execution
        exit;
    }

    public function array_list_fns(): void
    {
        // array_is_list verifies that an array which in php can be a dictionary is indead a list
        // array_values is used to reindex an array
    }

    public function firstclasscallable(): void
    {
        // create closure from callable
        // $closure = \Closure::fromCallable("array_spread_with_string_key");
        // NOw you could also create closure with the firstclasscallable syntax
        // $closure = array_spread_with_string_key();
    }
}
