#!/usr/bin/php
<?php

// Setze das aktuelle Verzeichnis (vereinfacht das Entwicklerleben)
chdir(dirname(__DIR__));

// PHP-Module importieren
require './etc/application.config.php';

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

printf("\nCompleted!\n\n");

/**
 * Anwendungsinformationen anzeigen
 */
function _applinfo(array $_config) {
    $config = $_config;
    printf("\nApplication Name:                                                                                             %s\n", $config["Application"]["Name"]);
    printf("Application Version: %s\n", $config["Application"]["Version"]);
    printf("Current Directory: %s\n", dirname(__DIR__));
}                                                                                           

?>