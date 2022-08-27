<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Presentacion</title>
</head>

<style>
    input {
        margin: 10px 0px;
        border-color: 0.7px solid gray;
    }
</style>

<body>
    <div class="container-flex m-2 w-25">
        <form class="needs-validation" action="../Control/presentacion.php" method="POST">
            <legend>Ingrese sus datos</legend>
            <div class="col-auto">
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre" required>
                <div class="invalid-feedback">
                    Ingrese un nombre válido.
                </div>
            </div>
            <div class="col-auto">
                <label for="apellido">Apellido: </label>
                <input type="text" name="apellido" id="apellido" required>
                <div class="invalid-feedback">
                    Ingrese un apellido válido.
                </div>
            </div>
            <div class="col-auto">
                <label for="edad">Edad: </label>
                <input type="text" name="edad" id="edad" required>
                <div class="invalid-feedback">
                    Ingrese una edad.
                </div>
            </div>
            <div class="col-auto">
                <label for="direccion">Direccion: </label>
                <input type="text" name="direccion" id="direccion" required>
                <div class="invalid-feedback">
                    Ingrese una dirección.
                </div>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" type="submit">Enviar datos</button>
            </div>
        </form>
    </div>
</body>

</html>