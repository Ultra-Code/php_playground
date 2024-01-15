<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

// session must be started before any output because it modifies headers
session_start();

echo '<pre>';
//set buffer output to 4096 so that using session_start() and setcookies
// phpinfo();
// print_r($_SERVER);
// echo '<pre>';
$router = new \Playground\Router();
$router->get("/", [\Playground\Views\Home::class,'index'])
        ->get("/invoice", [\Playground\Views\Invoice::class,'index'])
        ->get("/invoice/create", [\Playground\Views\Invoice::class,'create'])
        ->post("/invoice/create", [\Playground\Views\Invoice::class,'store']);
// $router->register("/", fn () => "Home Page");
// $router->register("/invoices", fn () => "Invoices Page");

echo $router->resolve($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);

echo '<br/>';
debug_zval_dump($_SESSION);
