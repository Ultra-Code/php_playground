<?php

error_reporting(E_ALL & ~E_WARNING);

error_log("Messate", E_USER_WARNING);
//display_errors();

function errorHandler(int $type, string $message, ?string $file = null, ?int $line = null)
{
    echo $type . ' : ' . $message . 'in' . $file . ' on line ' . $line;
    exit;
}

set_error_handler('errorHandler', E_ALL);//this overrides error reporting

//use restore_error_handler() to restore the previous error handler

trigger_error("Some user error", E_USER_ERROR); //E_USER_WARNING
