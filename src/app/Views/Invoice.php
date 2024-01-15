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
        return <<<HTML
        <form action="/invoice/create" method="post"> <label>Amount<label/><input type="text" name="amount"/> <form/>
        HTML;
    }

    public function store(): void
    {
        $amount = $_POST['amount'];
        debug_zval_dump($amount);
    }
}
