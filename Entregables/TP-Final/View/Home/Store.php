<?php
include_once("../../config.php");

// TODO Product Loader
$controlObj = new CProducto();
$products = $controlObj->List();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <!-- Main -->
    <main>

        <!-- Items -->
        <div class="container text-center pt-5">
            <h1 class="text-start py-3">
                Nuestro stock!
                <hr>
            </h1>
            <br>
            <br>
            <div class="row gy-5">
                <?php
                foreach ($products as $product) {
                    echo '<div class="col-6 p-4">
                            <div class="card-section card-section-first border rounded p-3">
                                <div class="card-header card-header-first rounded">
                                    <img src="' . $product->getUrlImagen() . '" alt="' . $product->getNombre() . 'image" height="100%">
                                </div>
                                <div class="card-body text-center">
                                    <h2 class="card-header-title pt-4">' . $product->getNombre() . '</h2>
                                    <p class="card-text">' . $product->getDetalle() . '</p>
                                </div>
                                <hr>
                                <div class="card-footer text-center">
                                    <h3 class="card-text">AR$' . $product->getProPrecio() . '</h3>
                                    <h3 class="card-text">Restante: ' . $product->getCantStock() . '</h3>
                                </div>
                                <span><a href="#"><i class="fa-solid fa-cart-plus rounded-circle" aria-hidden="true"></i></a></span>
                            </div>
                        </div>';
                    // TODO Change cart function.
                };
                ?>
            </div>
        </div>
    </main>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>