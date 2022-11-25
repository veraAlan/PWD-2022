<?php
include_once("../../config.php");
include_once("../Structure/Header.php");
if ($_SESSION['idrol'] < 2) {
    echo "<h1>Privilegios incorrectos para modificar los productos de la base de datos.</h1>";
    exit();
}

$datos = data_submitted();
$resp = false;
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
// print_r($datos);
if (isset($datos['action'])) {
    $CEstado = new CCompraEstado();
    $CEObj = $CEstado->List($datos)[0];

    if ($datos['action'] == 'modify') {
        $estadotipo = $CEObj->getCompraEstadoTipo();
        $esatdoval = $estadotipo->getIdCompraEstadoTipo();

        if (++$esatdoval <= 3) {
            if ($CEstado->Modify(['idcompra' => $CEObj->getCompra()->getIdCompra(), 'idcompraestadotipo' => $esatdoval, 'idcompraestado' => $datos['idcompraestado']])) {
                echo ("<script>location.href = './Procedures.php?msg=Se actualizo el estado de la compra.';</script>");
            } else {
                echo ("<script>location.href = './Procedures.php?msg=Error modificando los datos.';</script>");
            }
        } else {
            echo ("<script>location.href = './Procedures.php?msg=No hay estado luego de eviado (3).';</script>");
        }
    } else if ($datos['action'] == 'delete') {
        if ($CEstado->Modify(['idcompra' => $CEObj->getCompra()->getIdCompra(), 'idcompraestadotipo' => 4, 'idcompraestado' => $datos['idcompraestado']])) {
            echo ("<script>location.href = './Procedures.php?msg=Se cancelo correctamente la compra.';</script>");
        } else {
            echo ("<script>location.href = './Procedures.php?msg=Error modificando los datos.';</script>");
        }
    }
} else {
    echo ("<script>location.href = './Procedures.php?msg=Hubo un error con la accion.';</script>");
}
