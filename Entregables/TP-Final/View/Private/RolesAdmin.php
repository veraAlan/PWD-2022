<?php
include_once("../../config.php");
$controlObj = new CRol();
$registry = $controlObj->List();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles del Sitio</title>
</head>

<body>
    <?php
    // If menu isn't an admin role, then reject loading the page.
    if ($_SESSION['idrol'] < 3) {
        echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
        exit();
    }
    include_once('../Structure/Header.php'); ?>

    <!-- Items -->
    <div class="container text-center pt-5">
        <h1 class="text-start py-3">
            Roles a modificar
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
            foreach ($registry as $rol) {
                echo '<div class="col-6 p-4">
                <div class="card-section card-section-first border rounded p-3">
                    <div class="card-header card-header-first rounded h-25 text-white">
                        <h2>';
                echo $rol->getIdRol() . '</h2><h3 class="card-text">Descripcion:';
                echo $rol->getRolDescripcion() . '</h3>
                    </div>';
                if ($rol->getIdRol() > 3) {
                    echo '<form method="POST" action="RolModify.php">
                        <input id="action" name="action" value="modify" type="hidden">
                        <input name="idrol" value="';
                    echo $rol->getIdRol() . '" type="hidden"><input type="submit" class="btn btn-outline-danger" value="Modificar Rol">
                    </form>';
                    echo '<form method="POST" action="DropRol.php">
                            <input id="action" name="action" value="modify" type="hidden">
                            <input name="idrol" value="';
                    echo $rol->getIdRol() . '" type="hidden"><input type="submit" class="btn btn-outline-danger" value="Eliminar Rol">
                        </form>';
                }
                echo '
                </div>
            </div>';
            };
            ?>
            <div class="item-button"><a href="../Private/CreateRol.php" type="button">
                    <h1>Crear Rol</h1>
                </a></div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>