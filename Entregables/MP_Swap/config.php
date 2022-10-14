<?php

// Set project variables.

$PROJECT = 'PWD-2022/Entregables/MP_Swap';

$ROOT = $_SERVER['DOCUMENT_ROOT'] . "/$PROJECT/";

// TODO Definir pagina principal.
$INDEX = 'Location:http://' . $_SERVER['HTTP_HOST'] . "/$PROJECT/index.php";

$_SESSION['ROOT'] = $ROOT;
