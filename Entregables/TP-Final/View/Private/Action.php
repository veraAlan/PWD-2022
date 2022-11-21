<?php
include_once("../Structure/Header.php");

$datos = data_submitted();
$resp = false;
$_SESSION['idrol'] >= 3 ? $dir = "./Accounts.php" : $dir = "./Account.php";
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
// print_r($datos);
if (isset($datos['accAction'])) {
    $objUsuario = new CUsuario();
    if ($datos['accAction'] == 'register') {
        if ($objUsuario->Register($datos)) {
            echo ("<script>location.href = '" . $dir . "??msg=La cuenta se creo correctamente.';</script>");
        } else {
            echo ("<script>location.href = '" . $dir . "?msg=Error, id ya existe. Vuelva a intentarlo';</script>");
        }
    } else if ($datos['accAction'] == 'modify') {
        if ($objUsuario->Modify($datos)) {
            echo ("<script>location.href = '" . $dir . "?msg=Cambios realizados correctamente.';</script>");
        } else {
            echo ("<script>location.href = '" . $dir . "?msg=Error modificando los datos.';</script>");
        }
    } else if ($datos['accAction'] == 'delete') {
        $uRol = new CUsuarioRol();
        if ($uRol->Drop($datos) && $objUsuario->Drop($datos)) {
            echo ("<script>location.href = '" . $dir . "?msg=Se elimino la cuenta correctamente.';</script>");
        } else {
            echo ("<script>location.href = '" . $dir . "?msg=Error eliminando los datos.';</script>");
        }
    }
} else {
    echo ("<script>location.href = '" . $dir . "?msg=Hubo un error con la accion.';</script>");
}
