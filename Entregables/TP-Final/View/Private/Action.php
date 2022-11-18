<?php
// TODO Check if session is ADMIN

include_once("../Structure/Header.php");
$datos = data_submitted();
$resp = false;
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
// print_r($datos);
if (isset($datos['accAction'])) {
    $objUsuario = new Usuario();
    $objUsuario->setIdUsuario($datos['idusuario']);
    $objUsuario->Load();
    if ($datos['accAction'] == 'modify') {
        // TODO Debe modificar los datos del usuario segun el array conseguido por POST. Mantener los otros valores. Cambiar UsuarioRol si es necesario.
        $objUsuario = new Usuario();
        $objUsuario->setIdUsuario($datos['idusuario']);
        $objUsuario->Load();
        if ($datos['usnombre'] != "null") {
            $objUsuario->setUsNombre($datos['usnombre']);
        }
        if ($datos['uspass'] != "null") {
            $objUsuario->setUsPass($datos['uspass']);
        }
        if ($datos['usmail'] != "null") {
            $objUsuario->setUsMail($datos['usmail']);
        }
        if (isset($datos['usdeshabilitado'])) {
            $objUsuario->setUsDeshabilitado($datos['usdeshabilitado']);
        }

        $resp = $objUsuario->Modify();
        if ($resp) {
            echo ("<script>location.href = './Accounts.php?msg=Cambios realizados correctamente.';</script>");
        } else {
            echo ("<script>location.href = './Accounts.php?msg=Error modificando los datos.';</script>");
        }
    } else if ($datos['accAction'] == 'delete') {
        $resp = $objUsuario->Delete();
        if ($resp) {
            echo ("<script>location.href = './Accounts.php?msg=Se elimino la cuenta correctamente.';</script>");
        } else {
            echo ("<script>location.href = './Accounts.php?msg=Error eliminando los datos.';</script>");
        }
    }
} else {
    echo ("<script>location.href = './Accounts.php?msg=Hubo un error con la accion.';</script>");
}
