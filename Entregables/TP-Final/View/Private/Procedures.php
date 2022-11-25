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

            /* document.querySelector("#total-carrito").innerHTML = total; */
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
        <?php
        if (data_submitted()) {
            echo "<h2>" . $_GET['msg'] . "</h2>";
        }
        ?>
        <br>
        <br>
        <div class="row gy-5">
            <?php
            foreach ($ceo as $compraestado) {
                $item = $compraItemObj->List(['idcompra' => $compraestado->getCompra()->getIdCompra()])[0];
                $obj = new CProducto();
                $producto = $obj->List(['idproducto' => $item->getObjProducto()->getIdProducto()])[0];
            ?>
                <div class="col-6 p-4">
                    <div class="card-section card-section-first border rounded p-3">
                        <div class="card-body text-center">
                            <div class="card-header card-header-first h-25 rounded text-light">
                                <h2>ID Compra: <?php echo $compraestado->getCompra()->getIdCompra() ?></h2>
                            </div>
                            <h2 class="card-header-title pt-4">Producto: </h2>
                            <div>
                                <p class="card-text">Titulo: <?php echo $producto->getNombre() ?></p>
                                <p class="card-text">Cantidad: <?php echo $item->getCantidad() ?></p>
                                <p class="card-text">Estado de compra: <?php switch ($compraestado->getCompraEstadoTipo()->getidcompraestadotipo()) {
                                                                            case 1:
                                                                                echo "Iniciada";
                                                                                break;
                                                                            case 2:
                                                                                echo "Aceptada";
                                                                                break;
                                                                            case 3:
                                                                                echo "Enviada";
                                                                                break;
                                                                            case 4:
                                                                                echo "Cancelado";
                                                                                break;
                                                                        }
                                                                        ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="card-footer text-center pb-2">
                            <h4>
                                <form action="./ProcedureAction.php" method="POST">
                                    <input class="action" name="action" value="modify" type="hidden">
                                    <input class="action" name="idcompraestado" value="<?php echo $compraestado->getIdCompraEstado() ?>" type="hidden">
                                    <input type="submit" class="btn" value="Modificar estado">
                                </form>
                            </h4>
                            <h4>
                                <form action="./ProcedureAction.php" method="POST">
                                    <input class="action" name="action" value="delete" type="hidden">
                                    <input class="action" name="idcompraestado" value="<?php echo $compraestado->getIdCompraEstado() ?>" type="hidden">
                                    <input type="submit" class="btn" value="Eliminar compra">
                                </form>
                            </h4>
                        </div>
                    </div>
                </div>
            <?php
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