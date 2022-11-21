<?php // TODO Correct this file.
include_once("../../config.php");
if ($_SESSION['idrol'] < 3) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}

$datos = data_submitted();

$crol = new CRol();
$rol = $crol->LoadObjectEnKey($datos);

// Get reference to check boxes.
$cmr = new CMenuRol();
$menuRol = $cmr->LoadObjectEnKey($datos);

$cm = new CMenu();
$menuArray = $cm->List($datos);

echo "<br>";
print_r($rol);
echo "<br>";
print_r($menuRol);
echo "<br>";
print_r($menuArray);
echo "<br>";
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
            Rol a modificar
            <hr>
        </h1>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Modificar uno o mas:</h4>
                <form method="POST" action="Action.php" name="modifier" id="modifier">
                    <input id="accAction" name="accAction" value="modify" type="hidden">
                    <input id="idvalue" name="idusuario" value="1" type="hidden">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="idrol" class="form-label">Id Rol:</label>
                            <input type="text" class="form-control" name="idrol" id="idrol" value="<?php echo $rol->getIdRol(); ?>" disabled>
                        </div>

                        <div class="col-12">
                            <label for="usmail" class="form-label">Descripcion</label>
                            <input type="email" class="form-control" name="usmail" id="usmail" value="<?php echo $rol->getRolDescripcion(); ?>">
                        </div>
                        <hr class="my-4">

                        <h4 class="mb-3">Rol</h4>
                        <div class="my-3">
                            <?php
                            // TODO Correct
                            foreach ($menuArray as $menu) {
                                echo '<div class="form-check">
                                        <input id="rol' . $menu->getMeNombre() . '" name="idrol" type="checkbox" class="form-check-input" value="' . $menu->getIdMenu() . '"';
                                /* if ($menu->getIdMenu() == $menuRol->getRol()->getIdRol()) {
                                    echo 'checked><label class="form-check-label" for="' . $menu->getMeNombre() . '">';
                                } else { */
                                echo '><label class="form-check-label" for="' . $menu->getMeNombre() . '">';
                                // }
                                echo $menu->getMeNombre() . '</label></div>';
                            }
                            ?>
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