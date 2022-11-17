<?php
// Start the session
session_start();
if (!isset($_SESSION['idusuario'])) {
    $_SESSION['idusuario'] = 0;
}

/**
 * Configuration file.
 * Setter of root directory and usable directories.
 */

// Root directory (Depends on where the server is started on)
$GLOBALS['ROOT'] = $_SERVER["DOCUMENT_ROOT"];

// File directory. Takes the path from ROOT to file that's running currently.
$CUR_FILEDIR = $_SERVER["PHP_SELF"];

// Include directories and functions.
include_once("Util/functions.php");
