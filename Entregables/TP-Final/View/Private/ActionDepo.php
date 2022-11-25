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
    $objProducto = new CProducto();
    if ($datos['action'] == 'create') {
        $datos['urlimage'] == "null" ? $datos['urlimage'] = "../Img/empty.jpg" : "nothing";
        if ($objProducto->Register($datos)) {
            echo ("<script>location.href = '../Deposit.php??msg=El producto se creo correctamente.';</script>");
        } else {
            echo ("<script>location.href = './Deposit.php?msg=Error, id ya existe. Vuelva a intentarlo';</script>");
        }
    } else if ($datos['action'] == 'modify') {
        if ($objProducto->Modify($datos)) {
            echo ("<script>location.href = './Deposit.php?msg=Cambios realizados correctamente.';</script>");
        } else {
            echo ("<script>location.href = './Deposit.php?msg=Error modificando los datos.';</script>");
        }
    } else if ($datos['action'] == 'delete') {
        if ($objProducto->Drop($datos)) {
            echo ("<script>location.href = './Deposit.php?msg=Se elimino el producto correctamente.';</script>");
        } else {
            echo ("<script>location.href = './Deposit.php?msg=Error eliminando los datos.';</script>");
        }
    }
} else {
    echo ("<script>location.href = './Deposit.php?msg=Hubo un error con la accion.';</script>");
}
