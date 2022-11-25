<?php
include_once("../../config.php");

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
        <!-- Carrusel-->
        <div id="myCarousel" class="carousel slide pt-2 pb-5" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" aria-label="Slide 1" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>

            <div class="carousel-inner">
                <?php
                $featured = array_rand($products, 4);
                for ($i = 0; $i < 4; $i++) {
                    if ($i == 0) {
                        echo '<div class="carousel-item active" ';
                    } else {
                        echo '<div class="carousel-item" ';
                    }
                ?>
                    style="background: center / contain no-repeat url('<?php echo $products[$featured[$i]]->getUrlImagen() ?> ');">
                    <div class="containerCarousel text-center p-0 align-items-end align-contents-center">
                        <div class="row justify-content-center">
                            <div class="col-3">
                                <div class="card">
                                    <div class="card-header text-dark">
                                        <h2><?php echo $products[$featured[$i]]->getNombre() ?></h2>
                                        <h4>AR$ <?php echo $products[$featured[$i]]->getProPrecio() ?> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <?php
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
        </div>


        <!-- Items -->
        <div class="container text-center pt-5">
            <h1 class="text-start py-3">
                Nuestro stock!
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
                foreach ($products as $product) {
                ?>
                    <div class="col-6 p-4">
                        <div class="card-section card-section-first border rounded p-3">
                            <div class="card-header card-header-first rounded">
                                <img src="<?php echo $product->getUrlImagen() . '" alt="' . $product->getNombre() ?> image" height="100%">
                            </div>
                            <div class="card-body text-center">
                                <h2 class="card-header-title pt-4"><?php echo $product->getNombre() ?></h2>
                                <p class="card-text"><?php echo $product->getDetalle() ?></p>
                            </div>
                            <hr>
                            <div class="card-footer text-center">
                                <h3 class="card-text">AR$ <?php echo $product->getProPrecio() ?></h3>
                                <h3 class="card-text">Restante: <?php echo $product->getCantStock() ?></h3>
                            </div>
                            <form action="../Private/cartAction.php" method="POST">
                                <input name="action" type="hidden" value="create">
                                <input name="idproducto" type="hidden" value="<?php echo $product->getIdProducto(); ?>">
                                <?php if ($_SESSION['idrol'] == 1) { ?>
                                    <h4>Cantidad a comprar:</h4>
                                    <input name="cicantidad" type="number" min="0" value="0">
                                    <input type="submit" class="btn btn-secondary" placeholder="Comprar">
                                <?php  } ?>
                            </form>
                        </div>
                    </div>
                <?php
                };
                ?>
            </div>
        </div>
    </main>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>