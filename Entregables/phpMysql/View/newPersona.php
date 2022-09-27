<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Persona</title>
    <link rel="stylesheet" href="./Assets/css/bootstrapv5.2.1.min.css">
</head>

<body>
    <?php
    include "../config.php";
    include_once("../View/Structure/header.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="container">
                        <h2>Agregar un nueva Persona</h2>
                        <form action="./Action/ActionNewPersona.php" method="POST" class="needs-validation row-md-4 text-white" novalidate>
                            <div>
                                <label>Nombre: </label><input type="text" onkeypress="return soloLetras(event)" onblur="limpia()" maxlength="10" name="Nombre" id="Nombre" class="form-control text" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una nombre que exista
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <div>
                                <label>Apellido: </label><input type="text" onkeypress="return soloLetras(event)" onblur="limpia()" pattern="[a-zA-Z]+" maxlength="10" name="Apellido" id="Apellido" class="form-control text" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una apellido que exista
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <div>
                                <label>Documento: </label><input type="number" name="NroDni" maxlength="8" min="1000000" id="NroDni" class="form-control" required>
                                <div class="invalid-feedback">
                                    Porfavor ingrese un documento valido. Ejemplo: XX.XXX.XXX
                                </div>
                                <div class="valid-feedback">
                                    Bien
                                </div>
                            </div>
                            <div>
                                <label>Telefono: </label><input type="number" maxlength="11" pattern="[0-9]{3}?[-.]?[0-9]{7}" min="10000000000" name="Telefono" id="Telefono" class="form-control" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una telefono que exista. Ejemplo: ###-#######
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
                                <label class="mt-3">Fecha de nacimiento: </label><input type="date" pattern="^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})" name="fechaNac" id="fechaNac" class="form-control" required>
                                <div class="invalid-feedback">
                                    Debe ingregar una fecha de nacimiento que exista. Acepta solo numeros. Ejemplo XX/XX/XXXX
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
    <script>
        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toLowerCase();
            letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
            especiales = [8, 37, 39, 46];

            tecla_especial = false
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }

            if (letras.indexOf(tecla) == -1 && !tecla_especial)
                return false;
        }

        function limpia() {
            var val = document.getElementById("miInput").value;
            var tam = val.length;
            for (i = 0; i < tam; i++) {
                if (!isNaN(val[i]))
                    document.getElementById("miInput").value = '';
            }
        }
    </script>
    <script src="./Assets/js/soloLetras.js"></script>
    <script src="./Assets/js/limite.js"></script>
    <script src="./Assets/js/validateFields.js"></script>
    <script src="./Assets/js/bootstrap.bundlev5.2.1.min.js"></script>
    <script src="./Assets/js/jquery.validate.min.js"></script>
    <?php
    include_once("./Structure/footer.php")
    ?>
</body>

</html>