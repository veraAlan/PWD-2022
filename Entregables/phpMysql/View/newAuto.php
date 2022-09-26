<?php
include "../config.php";
include_once("../View/Structure/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>###</title>
    <script src="./Assets/js/bootstrap.bundlev5.2.1.min.js"></script>
    <link rel="stylesheet" href="./Assets/css/bootstrapv5.2.1.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="container col-md-5">
            <h2>Agregar un nuevo auto</h2>
            <form action="./Action/ActionNewAuto.php" method="POST" class="needs-validation row-md-4" novalidate>
                <div>
                    <label>Patente: </label><input type="text" pattern="[A-Z]{3}\s[0-9]{3}" name="Patente" id="Patente" class="form-control text" required>
                    <div class="invalid-feedback">
                        Debe ingregar minimo tres letras, tres numeros y un espacio
                    </div>
                    <div class="valid-feedback">
                        Bien
                    </div>
                </div>
                <div>
                    <label>Marca: </label><input type="text" pattern="[a-zA-Z]+\s?[a-zA-Z]*" name="Marca" id="Marca" class="form-control text" required>
                    <div class="invalid-feedback">
                        Debe ingregar una marca que exista
                    </div>
                    <div class="valid-feedback">
                        Bien
                    </div>
                </div>
                <div>
                    <label>Modelo: </label><input type="text" pattern="[a-zA-Z]*[0-9]*" name="Modelo" id="Modelo" class="form-control" required>
                    <div class="invalid-feedback">
                        Debe ingregar una marca que exista
                    </div>
                    <div class="valid-feedback">
                        Bien
                    </div>
                </div>
                <div>
                    <label>DNI del Dueño: </label><input type="number" min="1000000" name="DniDuenio" id="DniDuenio" class="form-control" required>
                    <div class="invalid-feedback">
                        Porfavor ingrese un documento valido. Ejemplo: XX.XXX.XXX
                    </div>
                    <div class="valid-feedback">
                        Bien
                    </div>
                </div>
                <input type="submit" name="boton_enviar" class="btn btn-dark mt-2" id="boton_enviar" value="Cargar">
            </form>
        </div>
    </div>
    <script src="./Assets/js/validateFields.js"></script>
</body>
</html>
<?php
include_once("./Structure/footer.php")
?>