<?php
include_once("../Structure/Header.php");

$datos = data_submitted();
$resp = false;
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
// print_r($datos);
if (isset($datos['action'])) {
    $uMenu = new CMenu();
    if ($datos['action'] == 'create') {
        if ($uMenu->Register($datos)) {
            echo ("<script>location.href = './RolesAdmin.php?msg=Menu creado.';</script>");
        } else {
            echo ("<script>location.href = './RolesAdmin.php?msg=Id ocupado por otro menu.';</script>");
        }
    } else if ($datos['action'] == 'delete') {
        if ($uMenu->Drop($datos)) {
            echo ("<script>location.href = './RolesAdmin.php?msg=Se elimino el rol correctamente.';</script>");
        } else {
            echo ("<script>location.href = './RolesAdmin.php?msg=Error eliminando los datos.';</script>");
        }
    } else if ($datos['action'] == 'modify') {
        if ($uMenu->Modify($datos)) {
            echo ("<script>location.href = './RolesAdmin.php?msg=Se modifico el rol correctamente.';</script>");
        } else {
            echo ("<script>location.href = './RolesAdmin.php?msg=Error modificando los datos.';</script>");
        }
    }
} else {
    echo ("<script>location.href = './RolesAdmin.php?msg=Hubo un error con la accion.';</script>");
}
