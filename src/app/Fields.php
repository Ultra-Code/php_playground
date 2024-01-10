<?php

namespace Playground;

abstract class Fields implements Renderable
{
    public function __construct(protected string  $name)
    {
    }
}
