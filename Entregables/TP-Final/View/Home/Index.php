<?php
session_start();
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
    <?php include_once('../Structure/header.php'); ?>

    <!-- Main -->
    <main>
        <!-- Carrusel-->
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image:url(../Img/0.jpg)">
                    <div class="containerCarousel text-end">
                        <h1>Nombre</h1>
                        <p>Descripcion</p>
                        <a class="btn btn-lg btn-light">Comprar</a>
                    </div>
                </div>
                <div class="carousel-item" style="background-image:url(../Img/1.jpg)">
                    <div class="containerCarousel text-end">
                        <h1>Nombre</h1>
                        <p>Descripcion</p>
                        <a class="btn btn-lg btn-light">Comprar</a>
                    </div>
                </div>
                <div class="carousel-item" style="background-image:url(../Img/2.jpg)">
                    <div class="containerCarousel text-end">
                        <h1>Nombre</h1>
                        <p>Descripcion</p>
                        <a class="btn btn-lg btn-light">Comprar</a>
                    </div>
                </div>
            </div>

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
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="card-section card-section-first border rounded p-3">
                        <div class="card-header card-header-first rounded">
                            <h2 class="card-header-title text-white pt-4">Juego</h2>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Descripcion</p>
                        </div>
                        <hr>
                        <span><a href="#"><i class="fa-solid fa-cart-plus rounded-circle" aria-hidden="true"></i></a></span>
                    </div>
                </div>
                <div class="col">
                    <div class="card-section card-section-first border rounded p-3">
                        <div class="card-header card-header-first rounded">
                            <h2 class="card-header-title text-white pt-4">Juego</h2>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Descripcion</p>
                        </div>
                        <hr>
                        <span><a href="#"><i class="fa-solid fa-cart-plus rounded-circle" aria-hidden="true"></i></a></span>
                    </div>
                </div>
                <div class="col">
                    <div class="card-section card-section-first border rounded p-3">
                        <div class="card-header card-header-first rounded">
                            <h2 class="card-header-title text-white pt-4">Juego</h2>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Descripcion</p>
                        </div>
                        <hr>
                        <span><a href="#"><i class="fa-solid fa-cart-plus rounded-circle" aria-hidden="true"></i></a></span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Vendedores -->
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle icon">
                        <title>Placeholder</title>
                    </svg>
                    <h2>Nombre</h2>
                    <p>Descripcion</p>
                    <p><a class="btn btn-light" href="#">View details »</a></p>
                </div>
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle icon">
                        <title>Placeholder</title>
                    </svg>
                    <h2>Nombre</h2>
                    <p>Descripcion</p>
                    <p><a class="btn btn-light" href="#">View details »</a></p>
                </div>
                <div class="col-lg-4">
                    <svg class="bd-placeholder-img rounded-circle icon">
                        <title>Placeholder</title>
                    </svg>
                    <h2>Nombre</h2>
                    <p>Descripcion</p>
                    <p><a class="btn btn-light" href="#">View details »</a></p>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>