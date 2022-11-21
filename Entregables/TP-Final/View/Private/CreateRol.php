<?php
include_once("../../config.php");
if ($_SESSION['idrol'] < 3) {
    echo "<h1>Privilegios insuficientes para modificar los roles de la base de datos.</h1>";
    exit();
}
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
            Cuenta a modificar
            <hr>
        </h1>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Modificar uno o mas:</h4>
                <form method="POST" action="./RolAction.php" name="crol" id="crol">
                    <input id="action" name="action" value="create" type="hidden">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="idrol" class="form-label">ID del rol: (Opcional)</label>
                            <div class="input-group has-validation">
                                <input type="number" class="form-control" name="idrol" id="idrol" value="0">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="rodescripcion" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" name="rodescripcion" id="rodescripcion" placeholder="Descripcion del rol">
                        </div>

                        <hr class="my-4">

                        <h5>Revise los cambios antes de enviarlos.</h5>
                        <button class="w-100 btn btn-primary btn-lg" type="button" onclick="submit()">Crear rol</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>