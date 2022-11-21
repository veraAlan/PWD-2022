<?php
include_once("../../config.php");
if ($_SESSION['idrol'] < 3) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}

$datos = data_submitted();

// TODO CARGAR OBJETO ROL DESDE CONTROL
$rol = new Rol();
// $rol = $Crol->Load($datos['idrol']);

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
                <!-- TODO HACER ACTION.PHP PARA ROL -->
                <form method="POST" action="Action.php" name="modifier" id="modifier">
                    <input id="accAction" name="accAction" value="modify" type="hidden">
                    <!-- TODO USAR VARIABLES DE ROL PARA LLENAR DATOS -->
                    <input id="idvalue" name="idusuario" value="<?php echo $rol->getIdRol(); ?>" type="hidden">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="username" class="form-label">Id (No Modificable)</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="usnombre" id="username" placeholder="<?php echo $rol->getIdRol(); ?>" disabled>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="usmail" class="form-label">Descripcion</label>
                            <input type="email" class="form-control" name="usmail" id="usmail" placeholder="<?php echo $rol->getRolDescripcion(); ?>">
                        </div>
                        <hr class="my-4">

                        <h5>Revise los cambios antes de enviarlos.</h5>
                        <button class="w-100 btn btn-primary btn-lg" type="submit" onclick="passHash()">Realizar cambios</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>