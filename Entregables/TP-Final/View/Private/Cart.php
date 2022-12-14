<?php
include_once("../../config.php");
if ($_SESSION['idrol'] < 1) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}

// TODO Check
$controlObj = new CCompra();
$comprasCart = $controlObj->List($_SESSION);
$compraItemObj = new CCompraItem();
$compraEstadObj = new CCompraEstado();
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
            Tu carrito
            <hr>
        </h1>
        <?php
        if (data_submitted()) {
            echo "<h2>" . $_GET['msg'] . "</h2>";
        }
        ?>
        <br>
        <br>
        <br>
        <div class="row gy-5">
            <?php
            foreach ($comprasCart as $compra) {


                $estado = $compraEstadObj->List(['idcompra' => $compra->getIdCompra()]);

                if ($estado == null) {
                    $item = $compraItemObj->List(['idcompra' => $compra->getIdCompra()])[0];
                    $obj = new CProducto();
                    $producto = $obj->LoadObjectEnKey(['idproducto' => $item->getObjProducto()->getIdProducto()]);
            ?>
                    <div class="col-6 p-4">
                        <div class="card-section card-section-first border rounded p-3">
                            <input class="total-producto" type="hidden" value="<?php echo ($producto->getProPrecio() * $item->getCantidad()) ?>">
                            <div class="card-header card-header-first rounded">
                                <img src="<?php echo $producto->getUrlImagen() . '" alt="' . $producto->getNombre(); ?> image" height="100%">
                            </div>
                            <div class="card-body text-center">
                                <h2 class="card-header-title pt-4"><?php echo $producto->getNombre() ?></h2>
                                <p class="card-text"><?php echo $producto->getDetalle() ?></p>
                            </div>
                            <hr>
                            <div class="card-footer text-center pb-2">
                                <h3 class="card-text">AR$<?php echo $producto->getProPrecio() ?></h3>
                                <h3 class="card-text">Cantidad: <?php echo $item->getCantidad() ?></h3><br>
                                <h3 class="card-text">Total: AR$<?php echo ($producto->getProPrecio() * $item->getCantidad()) ?></h2>
                            </div>
                            <h4>
                                <form action="./CartAction.php" method="POST">
                                    <input class="action" name="action" value="delete" type="hidden">
                                    <input class="action" name="idcompraitem" value="<?php echo $item->getIdCompraItem() ?>" type="hidden">
                                    <input type="submit" class="btn" value="Eliminar Producto">
                                </form>
                            </h4>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

            <hr class="my-4">

            <h2>Total del carrito: AR$<span id="total-carrito"></span></h2>

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