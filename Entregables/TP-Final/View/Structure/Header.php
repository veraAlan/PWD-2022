<?php
include_once('../../config.php');

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

<header>
    <div class="container-fluid">
        <div class="navb-logo">
            <a href="../Home/Index.php"><img src="../Img/logo.svg" alt="Logo"></a>
        </div>

        <div class="navb-items d-none d-lg-flex align-center w-25">
            <?php
            // Change idrol == 9 to menurol->getIdMenu() == 4, ==2 to IdMenu == 3 and lastly ==1 to idMenu == 2... Any other option to idmenu == 1. 
            if ($_SESSION['idusuario'] != -1 && $menuid == 3) { ?>
                <div class="item">
                    <a href="../Private/Deposit.php">Deposito</a>
                </div>

                <div class="item">
                    <a href="../Private/Procedures.php">Procedimientos</a>
                </div>
            <?php } else if ($_SESSION['idusuario'] != -1 && $menuid == 4) { ?>
                <div class="item">
                    <a href="../Private/Accounts.php">Cuentas</a>
                </div>

                <div class="item">
                    <a href="../Private/RolesAdmin.php">Roles Y Menu</a>
                </div>
            <?php } else { ?>
                <div class="item">
                    <a href="#">Soporte</a>
                </div>

                <div class="item">
                    <a href="../Home/About.php">Acerca</a>
                </div>
            <?php } ?>

            <div class="item-button">
                <?php if ($_SESSION['multirol'] == 1) { ?>
                    <form action="../Login/Action.php" method="POST"><input id="action" name="action" value="change" type="hidden">
                        <button class="btn btn-secondary p-0 m-0 b-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <a>Cambiar Rol</a>
                        </button>
                        <ul class="dropdown-menu p-0">
                            <?php $cur = new CUsuarioRol();
                            $data = ["idusuario" => $_SESSION['idusuario']];
                            $array = $cur->List($data);
                            foreach ($array as $rol) { ?>

                                <li><input id="idrol" name="idrol" value="' . $rol->getRol()->getIdRol() . '" type="submit" class="btn btn-secondary w-100"></li>
                            <?php } ?>
                        </ul>
                    </form>
                <?php }
                ?>
            </div>

            <div class="item-button">
                <?php if ($_SESSION['idusuario'] != -1 && ($menuid == 4 || $menuid == 3)) { ?>
                    <a href="../Private/Account.php">Cuenta</a>
                <?php } else if ($_SESSION['idusuario'] != -1 && $menuid == 2) { ?>
                    <a href="../Private/Cart.php" type="button">Carrito</a>
            </div>
            <div class="item-button"><a href="../Private/Account.php" type="button">Cuenta</a>
            <?php } else { ?>
                <a href="../Login/Login.php" type="button">Login</a>
            <?php }
            ?>
            </div>

            <div class="item-button">
                <?php
                if ($_SESSION['idusuario'] != -1) { ?>
                    <form method="POST" action="../Login/Action.php" name="form" id="formB">
                        <input class="action" name="action" value="cerrar" type="hidden">
                        <a type="button" class="btn btn-primary btn-block" onclick="document.querySelector('#formB').submit()">Cerrar Sesion</a>
                    </form>
                <?php } else { ?>
                    <a href="../Login/Register.php" type="button">Registrarse</a>
                <?php }
                ?>
            </div>
        </div>
    </div>
</header>