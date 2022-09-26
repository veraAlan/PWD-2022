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
    <title>>###</title>
    <script src="./Assets/js/bootstrap.bundlev5.2.1.min.js"></script>
    <script src="./Assets/js/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="./Assets/css/bootstrapv5.2.1.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="container">
                        <h2>Agregar un nueva Persona</h2>
                        <form action="./Action/ActionNewPersona.php" method="POST" class="needs-validation row-md-4" novalidate>
                            <div>
                                <label>Nombre: </label><input type="text" pattern="[a-zA-Z]+" maxlength="10" name="Nombre" id="Nombre" class="form-control text" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una nombre que exista
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <div>
                                <label>Apellido: </label><input type="text" pattern="[a-zA-Z]+" maxlength="10" name="Apellido" id="Apellido" class="form-control text" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una apellido que exista
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <div>
                                <label>Documento: </label><input type="number" name="NroDni" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="1000000" id="NroDni" class="form-control" required>
                                <div class="invalid-feedback">
                                    Porfavor ingrese un documento valido. Ejemplo: XX.XXX.XXX
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <div>
                                <label>Telefono: </label><input type="number" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" name="Telefono" id="Telefono" class="form-control" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una telefono que exista
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <div>
                                <label>Direccion: </label><input type="text" pattern="[a-zA-Z]+\s?[0-9]*" maxlength="40" name="Domicilio" id="Domicilio" class="form-control" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una direccion que exista
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <div>
                                <label class="mt-3">Fecha de nacimiento: </label><input type="date" onchange="obtenerFecha(this)" name="fechaNac" id="fechaNac" class="form-control" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una fecha de nacimiento que exista
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <input type="submit" name="boton_enviar" class="btn btn-dark mt-2" id="boton_enviar" value="Cargar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../View/Assets/js/fecha.js"></script>
    <script src="./Assets/js/validateFields.js"></script>
</body>

</html>
<?php
include_once("./Structure/footer.php")
?>