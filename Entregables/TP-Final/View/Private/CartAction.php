<?php
include_once("../Structure/Header.php");

$datos = data_submitted();

$controlObj = new CCompra();
$comprasCart = $controlObj->List($_SESSION);

$resp = false;
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
// print_r($datos);
if (isset($datos['action'])) {
    $compraItemObj = new CCompraItem();
    if ($datos['action'] == 'create') {
        $datos += ['idusuario' => $_SESSION['idusuario']];
        $controlObj->Register($datos);
        $arrayCompras = $controlObj->List();
        $compra = end($arrayCompras);
        $datos += ['idcompra' => $compra->getIdCompra()];

        if ($compraItemObj->Register($datos)) {
            echo ("<script>location.href = '../Home/Index.php?msg=Item agregado al carrito.';</script>");
        } else {
            echo ("<script>location.href = '../Home/Index.php?msg=No se pudo agregar item al carrito.';</script>");
        }
    } else if ($datos['action'] == 'delete') {
        $item = $compraItemObj->LoadObjectEnKey($datos);
        if ($compraItemObj->Drop($datos) && $controlObj->Drop(['idcompra' => $item->getObjCompra()->getIdCompra()])) {
            echo ("<script>location.href = './Cart.php?msg=Se elimino el item del carrito.';</script>");
        } else {
            echo ("<script>location.href = './Cart.php?msg=Error eliminando los datos.';</script>");
        }
    } else if ($datos['action'] == 'buy') {
        foreach ($comprasCart as $compra) {
            $compraEstadObj = new CCompraEstado();
            $estado = $compraEstadObj->List(['idcompra' => $compra->getIdCompra()]);

            if ($estado == null) {
                $item = $compraItemObj->LoadObjectEnKey(['idcompra' => $compra->getIdCompra()]);
                $obj = new CProducto();
                $producto = $obj->LoadObjectEnKey(['idproducto' => $item->getObjProducto()->getIdProducto()]);

                if ($producto->getCantStock() - $item->getCantidad() >= 0) {
                    $newStock = $producto->getCantStock() - $item->getCantidad();
                    $producto->setCantStock($newStock);
                    $producto->Modify();

                    $compraEstadObj->Register([
                        'idcompra' => $compra->getIdCompra(),
                        'idcompraestadotipo' => 1,
                        'cefechaini' => date('Y-m-d')
                    ]);
                } else {
                    echo ("<script>location.href = './Cart.php?msg=Error comprando algunos productos, stock insuficiente para tal compra.';</script>");
                    exit;
                }
            }
        }

        echo ("<script>location.href = './Cart.php?msg=Se modifico el rol correctamente.';</script>");
    }
} else {
    echo ("<script>location.href = './Cart.php?msg=Hubo un error con la accion.';</script>");
}
