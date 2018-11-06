#!/usr/bin/php
<?php

namespace main;

define("LF", "\n");

function _php_initial() {
    set_time_limit(30);                                 // Time limit
    error_reporting(E_ERROR | E_WARNING);               // Reporting errors amd warnings
    ini_set('error_reporting', E_ERROR | E_WARNING);    // Reporting errors amd warnings
    ini_set('display_errors', 1);                       // Display errors
    date_default_timezone_set('Europe/Berlin');         // Timezone settings eg. UTC or Europe/Berlin
}

class Application {

    private static $UT_START;
    private static $UT_LAP;
    private static $DT_NOW;
    private static $MC_UPDATE = 0;

    final public function __construct() {
        _php_initial();
        self::$UT_START = time();
    }

    final public function __destruct() {
        // TODO: Insert Destruction code here
        echo LF;
    }

    final public static function phpinfo() {
        phpinfo();
    }

    final public function getName() {
        return __CLASS__ . ":" . __METHOD__ . "()";
    }

    public static function update() {
        self::$MC_UPDATE += 1;
        self::$UT_LAP = time();
        self::$DT_NOW = date("Y-m-d H:i:s");
    }

    public static function refresh() {
        self::$MC_UPDATE = 0;
        self::$UT_START = time();
        self::$UT_LAP = time();
        self::$DT_NOW = date("Y-m-d H:i:s");
    }

    public static function expose($msg) {
        self::update();
        printf("%s (%d) - %s\n", self::$DT_NOW, self::$MC_UPDATE, $msg);
    }

    public static function args() {
        global $argv;
        self::expose(json_encode($argv));
    }
}

// Using the static Application class
Application::expose("Hello");

// Using an instance of class Application
$app = new Application();
$app->expose("World");
$app->args();

$func = $argv[1];
if ( method_exists($app, $func) )
    $app->$func($argv[2]);

$app->expose("Goodby!");

?>