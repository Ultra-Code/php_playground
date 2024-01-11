<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

echo '<pre>';

// phpinfo();
// print_r($_SERVER);
// echo '<pre>';
$router = new \Playground\Router();
$l = [\Playground\Views\Home::class,'index'];
$router->register("/", [\Playground\Views\Home::class,'index'])
        ->register("/invoice", [\Playground\Views\Invoice::class,'index'])
        ->register("/invoice/create", [\Playground\Views\Invoice::class,'create']);
// $router->register("/", fn () => "Home Page");
// $router->register("/invoices", fn () => "Invoices Page");

echo $router->resolve($_SERVER["REQUEST_URI"]);
