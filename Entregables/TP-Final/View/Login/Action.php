<?php
include_once("../Structure/Header.php");
$datos = data_submitted();
$resp = false;
//Array ( [action] => login [usmail] => mail@gmail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
print_r($datos);
if (isset($datos['action'])) {
    echo "<h1>Datos</h1>";
    if ($datos['action'] == "login") {
        $objTrans = new CSession();
        $resp = $objTrans->Start($datos['usmail'], $datos['uspass']);
        // Devuelve falso siempre.
        if ($resp) {
            echo "<h1>Good pass</h1>";
            // echo ("<script>location.href = '../Home/index.php';</script>");
        } else {
            echo "<h2>Error, vuelve a intentarlo</h2>";
            $mensaje = "Error, vuelva a intentarlo";
            // echo ("<script>location.href = './Login.php?msg=" . $mensaje . "';</script>");
        }
    }

    if ($datos['action'] == "cerrar") {
        $objTrans = new CSession();
        $resp = $objTrans->Destroy();
        if ($resp) {
            $mensaje = "Vuelva... lo estaremos esperando...";
            echo ("<script>location.href = './Login.php?msg=" . $mensaje . "';</script>");
        }
    }
}
