<?php
include_once("../../config.php");
if ($_SESSION['idrol'] < 1) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}

$controlObj = new CCompra();

$compraItemObj = new CCompraItem();
$compraEstadObj = new CCompraEstado();
$ceo = $compraEstadObj->List();
$procesados = array();

foreach ($ceo as $object) {
    $comprasCart = $controlObj->List(['idcompra' => $object->getIdCompraEstado()]);
    array_push($procesados, $comprasCart);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposito</title>

    <script>
        function createTotal() {
            arrayProductos = document.querySelectorAll(".total-producto");
            total = 0;

            arrayProductos.forEach(product => total += parseInt(product.value));

            document.querySelector("#total-carrito").innerHTML = total;
        }
    </script>
</head>

<body onload="createTotal()">
    <?php include_once('../Structure/Header.php'); ?>

    <!-- Items -->
    <div class="container text-center pt-5">
        <h1 class="text-start py-3">
            Compras en proceso
            <hr>
        </h1>
        <br>
        <div class="row gy-5">
            <?php
            foreach ($procesados[0] as $compra) {
                $item = $compraItemObj->LoadObjectEnKey(['idcompra' => $compra->getIdCompra()]);
                $obj = new CProducto();
                $producto = $obj->LoadObjectEnKey(['idproducto' => $item->getObjProducto()->getIdProducto()]);

                echo '<div class="col-6 p-4">
                            <div class="card-section card-section-first border rounded p-3">
                                <input class="total-producto" type="hidden" value="';
                echo $producto->getProPrecio() * $item->getCantidad();
                echo '">
                                <div class="card-header card-header-first rounded">
                                    <img src="' . $producto->getUrlImagen() . '" alt="' . $producto->getNombre() . 'image" height="100%">
                                </div>
                                <div class="card-body text-center">
                                    <h2 class="card-header-title pt-4">' . $producto->getNombre() . '</h2>
                                    <p class="card-text">' . $producto->getDetalle() . '</p>
                                </div>
                                <hr>
                                <div class="card-footer text-center pb-2">
                                    <h3 class="card-text">AR$' . $producto->getProPrecio() . '</h3>
                                    <h3 class="card-text">Cantidad: ' . $item->getCantidad() . '</h3><br>
                                    <h3 class="card-text">Total: AR$' . $producto->getProPrecio() * $item->getCantidad() . '</h2>
                                </div>
                                <h4>
                                    <form action="./CartAction.php" method="POST">
                                        <input class="action" name="action" value="delete" type="hidden">
                                        <input class="action" name="idcompraitem" value="' . $item->getIdCompraItem() . '" type="hidden">
                                        <input type="submit" class="btn" value="Eliminar Producto">
                                    </form>
                                </h4>
                            </div>
                        </div>';
            }
            ?>

            <hr class="my-4">

            <h4>
                <form action="./CartAction.php" method="POST">
                    <input class="action" name="action" value="buy" type="hidden">
                    <input class="idusuario" name="idusuario" value="<?php echo $_SESSION['idusuario']; ?>" type="hidden">
                    <input type="submit" class="btn" value="Comprar carrito">
                </form>
            </h4>

            <hr class="my-4">
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>