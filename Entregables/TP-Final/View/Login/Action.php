<?php
include_once("../Structure/Header.php");
$datos = data_submitted();
$resp = false;
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
// print_r($datos);
if (isset($datos['action'])) {
    if ($datos['action'] == "register") {
        $objUsuario = new CUsuario();
        if ($objUsuario->Register($datos)) {
            echo ("<script>location.href = '../Home/index.php?msg=La cuenta se creo correctamente.'; alert('La cuenta se creo correctamente')</script>");
        } else {
            echo ("<script>location.href = './Register.php?msg=Error, vuelva a intentarlo'; alert('Error creando la cuenta')</script>");
        }
    }

    if ($datos['action'] == "login") {
        $objTrans = new CSession();
        $resp = $objTrans->Start($datos['usmail'], $datos['uspass']);
        if ($resp) {
            echo ("<script>location.href = '../Home/index.php';</script>");
        } else {
            echo ("<script>location.href = './Login.php?msg=Error, vuelva a intentarlo';</script>");
        }
    }

    if ($datos['action'] == "change") {
        $_SESSION['idrol'] = $datos['idrol'];
        echo ("<script>location.href = '../Home/index.php?msg=Se cambio el rol';</script>");
    }

    if ($datos['action'] == "cerrar") {
        $objTrans = new CSession();
        $resp = $objTrans->Destroy();
        if ($resp) {
            echo ("<script>location.href = '../Home/index.php?msg=Sesion cerrada';</script>");
        }
    }
}
