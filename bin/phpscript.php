#!/usr/bin/php
<?php

// Setze das aktuelle Verzeichnis (vereinfacht das Entwicklerleben)
chdir(dirname(__DIR__));

// PHP-Module importieren
require 'etc/application.config.php';
require 'lib/application.lib.php';

/**
 * Hauptprogramm (GLOBAL)
 */

if ($argc > 1) {
    printf("\nArgumente (%d):\n", $argc);
    print_r($argv);
}

if (is_array($config))
    _applinfo($config);
else
    die("Configuration information is not available!");

printf("\nJSON:\n%s\n", json_encode($config));

printf("\nCompleted!\n\n");

/**
 * Anwendungsinformationen anzeigen
 */
function _applinfo(array $_config) {
    $config = $_config;
    printf("\nApplication Name: %s\n", $config["Application"]["Name"]);
    printf("Application Version: %s\n", $config["Application"]["Version"]);
    printf("BASE Directory: %s\n", dirname(__DIR__));
}                                                                                           

?>