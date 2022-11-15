<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5.2.2-->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
    <script src="../Assets/js/bootstrap.bundle.min.js"></script>
    <!--jQuery 3.6.1-->
    <script src="../Assets/js/jquery-3.6.1.min.js"></script>
    <!--Style-->
    <link rel="stylesheet" href="../Assets/css/style.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/1d6f0eb646.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>



<body>
    <!-- Header -->
    <header>
        <div class="container-fluid">

            <div class="navb-logo">
                <img src="../Img/logo.svg" alt="Logo">
            </div>

            <div class="navb-items d-none d-xl-flex">

                <div class="item">
                    <a href="/">Tienda</a>
                </div>

                <div class="item">
                    <a href="/services">Comunidad</a>
                </div>

                <div class="item">
                    <a href="/cases">Soporte</a>
                </div>

                <div class="item">
                    <a href="/about">Acerca</a>
                </div>

                <div class="item-button">
                    <a href="/contact" type="button">Login</a>
                </div>

                <div class="item-button">
                    <a href="/contact" type="button">Register</a>
                </div>
            </div>

            <!-- Button trigger modal -->
            <div class="mobile-toggler d-lg-none">
                <a href="#" data-bs-toggle="modal" data-bs-target="#navbModal">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="navbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <img src="../Img/logo.svg" alt="Logo">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                        </div>

                        <div class="modal-body">

                            <div class="modal-line">
                                <i class="fa-solid fa-house"></i><a href="/">Home</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-bell-concierge"></i><a href="#">Tienda</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-file-lines"></i> <a href="#">Comunidad</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-circle-info"></i><a href="#">Soporte</a>
                            </div>

                            <div class="modal-line">
                                <i class="fa-solid fa-circle-info"></i><a href="#">Acerca</a>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="item-button">
                                        <a href="/contact" type="button">Login</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="item-button">
                                        <a href="/contact" type="button">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </header>

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

    <!-- Footer -->
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="../Img/logo.svg" alt="Logo de SLee Dw">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Somos lo que somos</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2021 <b>VASA</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>
</body>

</html>