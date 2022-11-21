<?php
include_once('../../config.php');

// TODO Menu Loader
// Get actual menu that should load.
$rmenu = new CMenuRol();

$menurol = $rmenu->LoadObjectEnKey($_SESSION);
$menuid = $menurol->getMenu()->getIdMenu();
?>

<!--Bootstrap 5.2.2-->
<link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
<link rel="stylesheet" href="../Assets/css/bootstrap.min.css.map">
<script src="../Assets/js/bootstrap.bundle.min.js"></script>
<script src="../Assets/js/bootstrap.bundle.min.js.map"></script>
<!--jQuery 3.6.1-->
<script src="../Assets/js/jquery-3.6.1.min.js"></script>
<!--Style-->
<link rel="stylesheet" href="../Assets/css/style.css">
<!--Font Awesome-->
<script src="https://kit.fontawesome.com/1d6f0eb646.js" crossorigin="anonymous"></script>
<!-- Encrypt MD5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/md5.js"></script>

<!-- TODO Correct this structure, so it justifies and doesn't break on every resolution but 1080p -->
<header>
    <div class="container-fluid">
        <div class="navb-logo">
            <a href="../Home/Index.php"><img src="../Img/logo.svg" alt="Logo"></a>
        </div>

        <div class="navb-items d-none d-lg-flex align-center w-25">
            <div class="item">
                <a href="../Home/Store.php">Tienda</a>
            </div>
            <?php
            // Change idrol == 9 to menurol->getIdMenu() == 4, ==2 to IdMenu == 3 and lastly ==1 to idMenu == 2... Any other option to idmenu == 1. 
            if ($_SESSION['idusuario'] != -1 && $menuid == 3) {
                echo '<div class="item">
                            <a href="../Private/Deposit.php">Deposito</a>
                        </div>

                        <div class="item">
                            <a href="../Private/Procedures.php">Procedimientos</a>
                        </div>';
            } else if ($_SESSION['idusuario'] != -1 && $menuid == 4) {
                echo '<div class="item">
                            <a href="../Private/Accounts.php">Cuentas</a>
                        </div>

                        <div class="item">
                            <a href="../Private/RolesAdmin.php">Roles</a>
                        </div>';
            } else {
                echo '<div class="item">
                            <a href="../Home/Support.php">Soporte</a>
                        </div>

                        <div class="item">
                            <a href="../Home/About.php">Acerca</a>
                        </div>';
            }
            ?>

            <div class="item-button">
                <?php
                if ($_SESSION['multirol'] == 1) {
                    echo '<form action="../Login/Action.php" method="POST"><input id="action" name="action" value="change" type="hidden">
                        <button class="btn btn-secondary p-0 m-0 b-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <a>Cambiar Rol</a>
                        </button>
                        <ul class="dropdown-menu p-0">';
                    $cur = new CUsuarioRol();
                    $data = ["idusuario" => $_SESSION['idusuario']];
                    $array = $cur->List($data);
                    foreach ($array as $rol) {
                        echo '
                            <li><input id="idrol" name="idrol" value="' . $rol->getRol()->getIdRol() . '" type="submit" class="btn btn-secondary w-100"></li>';
                    }
                    echo "</ul></form>";
                }
                ?>
            </div>

            <div class="item-button">
                <?php
                if ($_SESSION['idusuario'] != -1 && ($menuid == 4 || $menuid == 3)) {
                    echo '<a href="../Private/Account.php">Cuenta</a>';
                } else if ($_SESSION['idusuario'] != -1 && $menuid == 2) {
                    echo '<a href="../Login/Login.php" type="button">Carrito</a></div>';
                    echo '<div class="item-button"><a href="../Private/Account.php" type="button">Cuenta</a>';
                } else {
                    echo '<a href="../Login/Login.php" type="button">Login</a>';
                }
                ?>
            </div>

            <div class="item-button">
                <?php
                if ($_SESSION['idusuario'] != -1) {
                    echo '<form method="POST" action="../Login/Action.php" name="form" id="formB">
                            <input class="action" name="action" value="cerrar" type="hidden">
                            <a type="button" class="btn btn-primary btn-block" onclick="document.getElementById(\'formB\').submit()">Cerrar Sesion</a>
                        </form>';
                } else {
                    echo '<a href="../Login/Register.php" type="button">Registrarse</a>';
                }
                ?>
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

                    <div class="modal-line">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown button
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>

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
                        <i class="fa-solid fa-circle-info"></i><a href="../Home/About.php">Acerca</a>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="item-button">
                                <?php
                                if ($_SESSION['idusuario'] != -1) {
                                    echo '<a href="../Login/Login.php" type="button">Carrito</a>';
                                } else {
                                    echo '<a href="../Login/Login.php" type="button">Login</a>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="item-button">
                                <?php
                                if ($_SESSION['idusuario'] != -1) {
                                    echo '<form method="POST" action="../Login/Action.php" name="form" id="formA">
                                                <input id="action" name="action" value="cerrar" type="hidden">
                                                <a type="button" class="btn btn-primary btn-block" onclick="document.getElementById(\'.formA\').submit()">Cerrar Sesion</a>
                                            </form>';
                                } else {
                                    echo '<a href="../Login/Register.php" type="button">Register</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>