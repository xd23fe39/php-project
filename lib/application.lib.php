<?php

define("LF", "\n");

$GLOBALS["BASEDIR"] = dirname(__DIR__);                 // Merke BASEDIR-Verzeichnis 

function _phpbase_initial($display = false) {
    if ($display) {
        error_reporting(E_ERROR | E_WARNING);               // Reporting errors amd warnings
        ini_set('error_reporting', E_ERROR | E_WARNING);    // Reporting errors amd warnings
        ini_set('display_errors', 1);                       // Display errors
    }
    chdir($GLOBALS["BASEDIR"]);                         // Setze das BASEDIR-Verzeichnis (vereinfacht das Entwicklerleben)
    set_time_limit(30);                                 // Time limit
    date_default_timezone_set('Europe/Berlin');         // Timezone settings eg. UTC or Europe/Berlin
}

?>