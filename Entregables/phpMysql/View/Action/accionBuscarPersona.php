<?php
include_once("../../config.php");
$data = data_submitted();
$personaObj = new CPersona();
$datosPersona = $personaObj->Search($data);
include_once("../Structure/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Persona</title>
    <link rel="stylesheet" href="../Assets/css/bootstrapv5.2.1.min.css">
</head>

<body onload="GetURLParameter('NroDni')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="container">
                        <h3>Resultado la busqueda:</h3>
                        <div class="my-3">
                            <?php
                            if (!empty($datosPersona)) {
                                echo '
                                <form action="ActualizarDatosPersona.php" method="GET">
                                    <div class="mb-3">
                                        <label for="NroDni" class="form-label text-white" disabled>DNI: (No se puede modificar)</label>
                                        <input type="text" class="form-control" id="NroDni" name="NroDni" readonly="readonly">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Nombre" class="form-label text-white">Nombre: </label>
                                        <input type="text" class="form-control" id="Nombre" name="Nombre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Apellido" class="form-label text-white">Apellido: </label>
                                        <input type="text" class="form-control" id="Apellido" name="Apellido">
                                    </div>
                                    <div class="mb-3">
                                        <label for="fechaNac" class="form-label text-white">Fecha de Nacimiento: </label>
                                        <input type="text" class="form-control" id="fechaNac" name="fechaNac">
                                        <div id="fechaNacHelp" class="form-text">Ayuda fecha nacimiento</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Telefono" class="form-label text-white">Telefono: </label>
                                        <input type="text" class="form-control" id="Telefono" name="Telefono" pattern="\d+-+\d\d\d\d\d\d\d">
                                        <div id="TelefonoHelp" class="form-text">Ayuda telefono</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Domicilio" class="form-label text-white">Domicilio: </label>
                                        <input type="text" class="form-control" id="Domicilio" name="Domicilio">
                                        <div id="DomicilioHelp" class="form-text">Nombre de la calle y altura.</div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </form>
                                ';
                            } else {
                                echo '<p>La persona no existe en la base de datos.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++) {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam) {
                    document.querySelector("#NroDni").value = sParameterName[1];
                }
            }
        }
    </script>

    <?php
    include_once("../Structure/footer.php")
    ?>
</body>

</html>