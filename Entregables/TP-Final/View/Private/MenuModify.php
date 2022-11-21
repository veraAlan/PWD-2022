<?php // TODO Correct this file.
include_once("../../config.php");
if ($_SESSION['idrol'] < 3) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}

$datos = data_submitted();

$cm = new CMenu();
$menu = $cm->LoadObjectEnKey($datos);

$cmp = new CMenu();
$padreArray = $cmp->List();
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

    <div class="container text-center pt-5 justify-content-center">
        <h1 class="text-start py-3">
            Menu a modificar
            <hr>
        </h1>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Modificar uno o mas:</h4>
                <form method="POST" action="./MenuAction.php" name="modifier" id="modifier">
                    <input id="action" name="action" value="modify" type="hidden">
                    <input name="idmenu" value="<?php echo $menu->getIdMenu(); ?>" type="hidden">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="idmenu" class="form-label">Id Rol: (No Modificable)</label>
                            <input type="number" class="form-control" id="idmenu" value="<?php echo $menu->getIdMenu(); ?>" disabled>
                        </div>

                        <div class="col-12">
                            <label for="menombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="menombre" id="menombre" value="<?php echo $menu->getMeNombre(); ?>">
                        </div>

                        <div class="col-12">
                            <label for="medescripcion" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" name="medescripcion" id="medescripcion" value="<?php echo $menu->getMeDescripcion(); ?>">
                        </div>

                        <h4 class="mb-3">Padre del menu</h4>
                        <div class="my-3">
                            <?php
                            foreach ($padreArray as $padre) {
                                echo '<div class="form-check">
                                    <input id="padre' . $padre->getMeNombre() . '" name="idpadre" type="radio" class="form-check-input" value="' . $padre->getIdMenu() . '"';
                                if ($padre->getIdMenu() == $menu->getPadre()->getIdMenu()) {
                                    echo "checked";
                                }
                                echo '><label class="form-check-label" for="' . $padre->getMeNombre() . '">';
                                echo $padre->getMeNombre() . '</label></div>';
                            }
                            ?>
                        </div>

                        <div class="form-check">
                            <?php
                            if ($menu->getMeDeshabilitado() != null) {
                                echo "<p>Ultima vez deshabilitado: " . $menu->getMeDeshabilitado() . "</p>";
                            }
                            ?>
                            <input type="checkbox" class="form-check-input" id="medeshabilitado" name="medeshabilitado" value="<?php echo date("Y/m/d") ?>">
                            <label class="form-check-label" for="medeshabilitado">Deshabilitar</label>
                        </div>

                        <hr class="my-4">

                        <h5>Revise los cambios antes de enviarlos.</h5>
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Realizar cambios</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>