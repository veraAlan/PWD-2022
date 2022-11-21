<?php
include_once("../../config.php");
if ($_SESSION['idrol'] < 2) {
    echo "<h1>Privilegios insuficientes para modificar los produtos de la base de datos.</h1>";
    exit();
}

$datos = data_submitted();

$objProduct = new CProducto();
$product = $objProduct->LoadObjectEnKey($datos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
</head>

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <div class="container text-center pt-5 justify-content-center">
        <h1 class="text-start py-3">
            Cuenta a modificar
            <hr>
        </h1>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Modificar uno o mas:</h4>
                <form method="POST" action="./ActionDepo.php" name="Pmodifier" id="Pmodifier">
                    <input id="action" name="action" value="modify" type="hidden">
                    <input id="idvalue" name="idproducto" value="<?php echo $product->getIdProducto(); ?>" type="hidden">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="pronombre" class="form-label">Nombre</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="pronombre" id="pronombre" placeholder="<?php echo $product->getNombre(); ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="prodetalle" class="form-label">Detalle</label>
                            <input type="text" class="form-control" name="prodetalle" id="prodetalle" value="<?php echo $product->getDetalle(); ?>">
                        </div>

                        <div class="col-12">
                            <label for="idproducto" class="form-label">Id product (No Modificable)</label>
                            <input type="text" class="form-control" placeholder="<?php echo $product->getIdProducto(); ?>" value="<?php echo $product->getIdProducto(); ?>" disabled>
                        </div>

                        <div class="col-12">
                            <label for="procantstock" class="form-label">Cantidad Stock</label>
                            <input type="text" class="form-control" name="procantstock" id="procantstock" value="<?php echo $product->getCantStock(); ?>">
                        </div>

                        <div class="col-12">
                            <label for="proprecio" class="form-label">Precio</label>
                            <input type="text" class="form-control" name="proprecio" id="proprecio" value="<?php echo $product->getProPrecio(); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Cargar Imagen</label>
                            <input class="form-control" type="file" id="urlimage" name="urlimage">
                        </div>

                        <hr class="my-4">

                        <h5>Revise los cambios antes de enviarlos.</h5>
                        <button class="w-100 btn btn-primary btn-lg" type="button" onclick="submit()">Realizar cambios</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>