<?php

namespace Ultracode\Test;

function pretty_print(array  $value): void
{
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
