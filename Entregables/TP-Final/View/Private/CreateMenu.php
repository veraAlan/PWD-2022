<?php
include_once("../../config.php");
if ($_SESSION['idrol'] < 3) {
    echo "<h1>Privilegios insuficientes para modificar los roles de la base de datos.</h1>";
    exit();
}
$datos = data_submitted();

// Get reference for check boxes.
$cmr = new CMenuRol();
$menuRol = $cmr->LoadObjectEnKey($datos);

$cm = new CMenu();
$menuArray = $cm->List($datos);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
</head>

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <div class="container text-center pt-5 justify-content-center">
        <h1 class="text-start py-3">
            Menu a crear
            <hr>
        </h1>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Agregar datos:</h4>
                <form method="POST" action="./MenuAction.php" name="crol" id="crol">
                    <input id="action" name="action" value="create" type="hidden">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="idmenu" class="form-label">ID del menu: (Opcional)</label>
                            <div class="input-group has-validation">
                                <input type="number" class="form-control" name="idmenu" id="idmenu" value="0">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="menombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="menombre" id="menombre" placeholder="Nombre del menu">
                        </div>

                        <h4 class="mb-3">Padre del menu (Opcional)</h4>
                        <div class="my-3">
                            <?php
                            foreach ($menuArray as $menu) {
                                echo '<div class="form-check">
                                    <input id="padre' . $menu->getMeNombre() . '" name="idpadre" type="radio" class="form-check-input" value="' . $menu->getIdMenu() . '">
                                    <label class="form-check-label" for="' . $menu->getMeNombre() . '">';
                                echo $menu->getMeNombre() . '</label></div>';
                            }
                            ?>
                        </div>

                        <hr class="my-4">

                        <h5>Revise los cambios antes de enviarlos.</h5>
                        <button class="w-100 btn btn-primary btn-lg" type="button" onclick="submit()">Crear menu</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>