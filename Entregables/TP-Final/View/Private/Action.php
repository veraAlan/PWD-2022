<?php
include_once("../Structure/Header.php");
if ($_SESSION['idrol'] != 3) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}

$datos = data_submitted();
$resp = false;
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
// print_r($datos);
if (isset($datos['accAction'])) {
    $objUsuario = new Usuario();
    $objUsuario->setIdUsuario($datos['idusuario']);
    $objUsuario->Load();
    if ($datos['accAction'] == 'modify') {
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
