<?php
include_once("../Structure/Header.php");

$datos = data_submitted();
$resp = false;
$_SESSION['idrol'] >= 3 ? $dir = "./Accounts.php" : $dir = "./Account.php";
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
// print_r($datos);
if (isset($datos['action'])) {
    $uRol = new CRol();
    if ($datos['action'] == 'create') {
        if ($uRol->Register($datos)) {
            echo ("<script>location.href = './RolesAdmin.php?msg=Rol creado.';</script>");
        } else {
            echo ("<script>location.href = './RolesAdmin.php?msg=Id ocupado por otro rol.';</script>");
        }
    } else if ($datos['action'] == 'delete') {
        if ($uRol->Drop($datos)) {
            // echo ("<script>location.href = './RolesAdmin.php?msg=Se elimino el rol correctamente.';</script>");
        } else {
            // echo ("<script>location.href = './RolesAdmin.php?msg=Error eliminando los datos.';</script>");
        }
    } else if ($datos['action'] == 'modify') {
        if ($uRol->Drop($datos)) {
            // echo ("<script>location.href = './RolesAdmin.php?msg=Se elimino el rol correctamente.';</script>");
        } else {
            // echo ("<script>location.href = './RolesAdmin.php?msg=Error eliminando los datos.';</script>");
        }
    }
} else {
    echo ("<script>location.href = './RolesAdmin.php?msg=Hubo un error con la accion.';</script>");
}
