<?php
require_once __DIR__ . '/../vendor/autoload.php';

$timeout = 0;

ini_set( "session.gc_maxlifetime", $timeout);
ini_set( "session.cookie_lifetime", $timeout);

ini_set( "track_errors", true);
ini_set( "error_reporting",  E_ALL);

function exceptions_error_handler($severity, $message, $filename, $lineno) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
}

set_error_handler('exceptions_error_handler', E_ALL);

session_start();
// dd($_SERVER);
try {
    require_once __DIR__ . '/../app/Router/route.php';
} catch (\Throwable $th) {
    err($th);
}
