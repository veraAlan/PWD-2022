<?php
// TODO Check if session is ADMIN

include_once("../Structure/Header.php");
$datos = data_submitted();
$resp = false;
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
print_r($datos);
if (isset($datos['change'])) {
    // TODO Debe modificar los datos del usuario segun el array conseguido por POST. Mantener los otros valores. Cambiar UsuarioRol si es necesario.
    // $objUsuario = new Usuario();
    // $resp = $objUsuario->Start($datos['usmail'], $datos['uspass'], $datos['uspass'], $datos['uspass'], $datos['uspass']);
    // $userid = $datos['change'];
} else {
    echo "There was an error.";
}
