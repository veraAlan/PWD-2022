    <!--Bootstrap 5.2.2-->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
    <script src="../Assets/js/bootstrap.bundle.min.js"></script>
    <!--jQuery 3.6.1-->
    <script src="../Assets/js/jquery-3.6.1.min.js"></script>
    <!--Style-->
    <link rel="stylesheet" href="../Assets/css/style.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/1d6f0eb646.js" crossorigin="anonymous"></script>


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
