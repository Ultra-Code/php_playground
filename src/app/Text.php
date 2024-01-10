<?php

namespace Playground;

class Text extends Fields
{
    public function render(): string
    {
        return <<<HTML
        <input type="text" name="{$this->name}"/>
        HTML;
    }
}
