<?php

declare(strict_types=1);

namespace Playground\Views;

class Invoice
{
    public function index(): string
    {
        return "Invoice Page";
    }
    public function create(): string
    {
        return "Create Invoice Page";
    }
}
