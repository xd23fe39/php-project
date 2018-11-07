#!/usr/bin/php
<?php

namespace main;

// Setze das BASEDIR-Verzeichnis (vereinfacht das Entwicklerleben)
chdir(dirname(__DIR__));

require "lib/application.lib.php";

final class Application {

    private static $UT_START;
    private static $UT_LAP;
    private static $DT_NOW;
    private static $MC_UPDATE = 0;

    final public function __construct() {
        _phpbase_initial(true);
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
        self::$UT_LAP = self::$UT_START;
        self::$DT_NOW = date("Y-m-d H:i:s");
    }

    public static function expose($msg) {
        self::update();
        printf("%s (%d) - %s\n", self::$DT_NOW, self::$MC_UPDATE, $msg);
    }

    public static function exposeGlobal($name) {
        self::expose($name . ": " . $GLOBALS[$name]);
    }

    public static function exposeArgs() {
        global $argv;
        self::expose("Args: " . json_encode($argv));
    }
}

// Using the static Application class
Application::expose("Hello");

// Using an instance of class Application
$app = new Application();
$app->expose("World");

$func = $argv[1];
if ( method_exists($app, $func) )
    $app->$func($argv[2]);
else if (!empty($func)) $app->expose("Unknown method: $func");

$app->expose("Goodbye!");

?>