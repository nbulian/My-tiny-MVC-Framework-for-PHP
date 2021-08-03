<?php
// Entry point of your PHP MVC framework

require_once '../app/bootstrap.php';

ini_set('display_errors', IS_DEV);
ini_set('display_startup_errors', IS_DEV);

if (IS_DEV) {
    error_reporting(E_ALL);
}

// Init Core Library
$init  = new Core;
