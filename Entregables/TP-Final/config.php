<?php
// Start the session and set variables if not already set.
session_start();
if (!isset($_SESSION['idusuario'])) {
    $_SESSION['idusuario'] = -1;
}
if (!isset($_SESSION['idrol'])) {
    $_SESSION['idrol'] = 0;
}
if (!isset($_SESSION['multirol'])) {
    $_SESSION['multirol'] = false;
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
