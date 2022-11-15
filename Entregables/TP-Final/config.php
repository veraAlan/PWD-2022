<?php

/**
 * Configuration file.
 * Setter of root directory and usable directories.
 */

// Root directory (Depends on where the server is started on)
$ROOT = $_SERVER["DOCUMENT_ROOT"];

// File directory. Takes the path from ROOT to file that's running right now.
$CUR_FILEDIR = $_SERVER["PHP_SELF"];

// 