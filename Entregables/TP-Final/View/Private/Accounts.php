<?php
include_once("../../config.php");

// TODO Product Loader
$controlObj = new Usuario();
$registry = $controlObj->List();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas del Sitio</title>
</head>

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <!-- Items -->
    <div class="container text-center pt-5">
        <h1 class="text-start py-3">
            Cuentas
            <hr>
        </h1>
        <br>
        <br>
        <div class="row gy-5">
            <?php
            foreach ($registry as $account) {
                echo '<div class="col-6 p-4">
                            <div class="card-section card-section-first border rounded p-3">
                                <div class="card-header card-header-first rounded">
                                    <h1>' . $account->getUsNombre() . '</h1>
                                </div>
                                <div class="card-body text-center">
                                    <h3 class="card-header-title pt-4">Id Usuario: ' . $account->getIdUsuario() .  '</h3>
                                    <p class="card-text">Email: ' . $account->getUsMail() . '</p>
                                </div>
                                <hr><form method="POST" action="AdminModify.php">
                                    <input name="idusuario" value="' . $account->getIdUsuario() . '" type="hidden">
                                    <input type="submit" value="Modificar informacion">
                                </form>
                            </div>
                        </div>';
            };
            ?>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>