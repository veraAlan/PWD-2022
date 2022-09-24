<?php

$PROJECT = 'PWD-2022/Entregables/phpMysql';

$ROOT = $_SERVER['DOCUMENT_ROOT'] . "/$PROJECT/";

include_once($ROOT . 'Utils/functions.php');

// TODO Definir pagina principal.
$INDEX = 'Location:http://' . $_SERVER['HTTP_HOST'] . '/$PROJECT/Vista/';

$_SESSION['ROOT'] = $ROOT;
