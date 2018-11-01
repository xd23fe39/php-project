<?php

/**
 * Apache Configuration:
 * 
 * SetEnv APPLICATION_ENV "DEVOPT"
 */

if (isset($_SERVER['APPLICATION_ENV']) && $_SERVER['APPLICATION_ENV'] === 'DEVOPT') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}

$config["Application"]["Name"] = "DemoApp.php";
$config["Application"]["Version"] = "1.0.0";
$config["Application"]["Author"] = "Author";
$config["Application"]["Mail"] = "NoMail@author";

?>