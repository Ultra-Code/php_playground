<?php

declare(strict_types=1);

namespace Playground\Views;

class Home
{
    public function index(): string
    {
        // echo '<pre>';
        // debug_zval_dump($_GET);
        //
        // echo PHP_EOL;
        //
        // debug_zval_dump($_POST);
        //
        // echo PHP_EOL;
        //
        // debug_zval_dump($_REQUEST);

        $_SESSION['count'] = ($_SESSION['count'] ?? 0) + 1;

        return "Home Page";
    }
}
