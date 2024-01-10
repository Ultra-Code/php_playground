<?php

namespace Playground;

interface DebtCollector extends IndependentCollectors
{
    const IN_INTERFACES_CANT_BE_OVERRIDEN = true;
    function collect(float  $amount_owed): float;
}
