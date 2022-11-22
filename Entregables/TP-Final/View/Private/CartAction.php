<?php
include_once("../Structure/Header.php");

$datos = data_submitted();
$resp = false;
// $datos = Array ( [action] => login/cerrar [usmail] => mail@mail.com [uspass] => h98s8gt55f00b204e6123994erg8487f )
print_r($datos);
if (isset($datos['action'])) {
    $comprai = new CCompraItem();
    if ($datos['action'] == 'create') {
        if ($comprai->Register($datos)) {
            // echo ("<script>location.href = './Cart.php?msg=Menu creado.';</script>");
        } else {
            // echo ("<script>location.href = './Cart.php?msg=Id ocupado por otro menu.';</script>");
        }
    } else if ($datos['action'] == 'delete') {
        if ($comprai->Drop($datos)) {
            echo ("<script>location.href = './Cart.php?msg=Se elimino el producto correctamente.';</script>");
        } else {
            echo ("<script>location.href = './Cart.php?msg=Error eliminando los datos.';</script>");
        }
    } else if ($datos['action'] == 'buy') {
        $resp = false;

        $compraestado = new CCompraEstado();
        $arrayEstado = $compraestado->List();

        /* $objCompra = new CCompra();
        $arrayCompra = $objCompra->List($datos);
        $actualCart = array($_SESSION); */

        $controlObj = new CCompra();
        $products = $controlObj->List($_SESSION);

        $compraitemArray = $comprai->List($products);
        $cart = array();

        foreach ($compraitemArray as $compra) {
            foreach ($arrayEstado as $cestado) {
                if ($cestado->getIdCompraEstado() != $compra->getIdCompraItem()) {
                    $obj = $comprai->LoadObjectEnKey(['idcompra' => $compra->getIdCompraItem()]);
                    array_push($cart, $obj);
                    break;
                }
            }
        }

        foreach ($cart as $item) {
            $compraestado->Register([
                'idcompra' => $item->getIdCompraItem(),
                'idcompraestadotipo' => 1,
                'cefechaini' => date('Y-m-d')
            ]);
        }

        /* foreach ($actualCart as $item) {
            echo "<br><h4>Item : ";
            print_r($item);
            echo "</h4><br>";
        }

        $arrayEstado = $compraestado->List();

        foreach ($arrayEstado as $item) {
            echo "<br><h4>After estado : ";
            print_r($item);
            echo "</h4><br>";
        } */

        /* $arrayItems = $comprai->List();

        foreach ($arrayItems as $item) {
            foreach ($arrayEstado as $estado) {
                if ($estado->getIdCompraEstado() != $item->getIdCompraItem()) {
                    $nestado = new CCompraEstado();
                    $nestado->Register([
                        'idcompra' => $item->getIdCompraItem(),
                        'idcompraestadotipo' => 1,
                        'cefechaini' => date('Y-m-d')
                    ]);
                }
            }
        }

        $arrayItems = $comprai->List();

        foreach ($arrayItems as $item) {
            foreach ($arrayEstado as $estado) {
                if ($estado->getIdCompraEstado() == $item->getIdCompraItem()) {
                    $resp = false;
                }
            }
        } */

        if ($resp) {
            echo "Good addition";
            // echo ("<script>location.href = './Cart.php?msg=Se modifico el rol correctamente.';</script>");
        } else {
            echo "Bad addition";
            // echo ("<script>location.href = './Cart.php?msg=Error modificando los datos.';</script>");
        }
    }
} else {
    echo ("<script>location.href = './Cart.php?msg=Hubo un error con la accion.';</script>");
}
