#!/usr/bin/php
<?php

// Setze das aktuelle Verzeichnis (vereinfacht das Entwicklerleben)
chdir(dirname(__DIR__));

phpinfo();

if (file_exists('./etc/application.config.php')) {
    require './etc/application.config.php';
    printf("\nApplication Name: %s\n", $config["Application"]["Name"]);
    printf("Application Version: %s\n", $config["Application"]["Version"]);
    printf("Current Directory: %s\n", __DIR__);
    printf("BASE Directory: %s\n", dirname(__DIR__));
}
else 
    die("No application configuratio9n file found!");

if ($argc > 1) {
    printf("\nArgumente (%d):\n", $argc);
    print_r($argv);
}

if (is_array($config))
    printf("\nConfiguration Output:\n%s\n" , json_encode($config));

$PHP_BASE = getenv('PHP_BASE');

if ($PHP_BASE)
    printf("\nPHP_BASE gefunden. %s\n", $PHP_BASE);
else
    printf("\nPHP_BASE nicht gefunden: Beispiel: \n  export PHP_BASE=%s\n", __DIR__);

printf("\nCompleted!\n\n");
?>