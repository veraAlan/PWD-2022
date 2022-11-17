<?php
include_once("../../config.php");

// TODO Product Loader
$controlObj = new CProducto();
$products = $controlObj->List();
?>
/>
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
        <!-- Carrusel-->
        <div id="myCarousel" class="carousel slide pt-2 pb-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
            </div>

            <div class="carousel-inner">
                <?php
                for ($i = 0; $i < 3; $i++) {
                    $featured = array_rand($products);
                    if ($i == 0) {
                        echo '<div class="carousel-item active" ';
                    } else {
                        echo '<div class="carousel-item" ';
                    }

                    echo 'style="background: center / contain no-repeat url(' . $products[$featured]->getUrlImagen() . ');">
                            <div class="containerCarousel text-center p-0 align-items-end align-contents-center">
                                <div class="row justify-content-center">
                                    <div class="col-3">
                                        <div class="card">
                                            <div class="card-header text-dark">
                                            <h2>' . $products[$featured]->getNombre() . '</h2>
                                            <a href="#"><h4>AR$' . $products[$featured]->getProPrecio() . '<span><i class="fa-solid fa-cart-plus rounded-circle" aria-hidden="true"></i></span></h4></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                ?>

                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


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