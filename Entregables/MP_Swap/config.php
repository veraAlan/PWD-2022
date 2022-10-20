<?php

// Set project variables.

$PROJECT = '/';

$ROOT = $_SERVER['DOCUMENT_ROOT'] . $PROJECT;

$INDEX = 'Location:http://' . $_SERVER['HTTP_HOST'] . $PROJECT . "index.php";

$_SESSION['ROOT'] = $ROOT;
