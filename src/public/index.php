<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

define("STORAGE_PATH", __DIR__ . '/../storage');

// session must be started before any output because it modifies headers
session_start();

setcookie("User", "Bernard", time() + 10);

echo '<pre>';
//set buffer output to 4096 so that using session_start() and setcookies
// phpinfo();
// print_r($_SERVER);
// echo '<pre>';
$router = new \Playground\Router();
$router->get("/", [\Playground\Views\Home::class,'index'])
        ->post("/upload", [\Playground\Views\Home::class,'upload'])
        ->get("/invoice", [\Playground\Views\Invoice::class,'index'])
        ->get("/invoice/create", [\Playground\Views\Invoice::class,'create'])
        ->post("/invoice/create", [\Playground\Views\Invoice::class,'store']);
// $router->register("/", fn () => "Home Page");
// $router->register("/invoices", fn () => "Invoices Page");

try {
echo $router->resolve($_SERVER["REQUEST_METHOD"], $_SERVER["REQUEST_URI"]);
} catch (\Playground\Exceptions\RouteNotFound $exception){
    // header(header: "HTTP/1.1: 404 not found",response_code:404);
    http_response_code(404);
    echo $exception->getMessage();
}
echo '<br/>';
// debug_zval_dump($_SESSION);
// debug_zval_dump($_COOKIE);
