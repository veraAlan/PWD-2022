<?php
include "../../config.php";
$data = data_submitted();
$arrayAuto = new CAuto();
$arrayPersona = new CPersona();
$dataAuto = $arrayAuto->Search($data);
$nroDni["NroDni"] = $data["DniDuenio"];
$dataPersona = $arrayPersona->Search($nroDni);
include_once("Menu/Cabecera.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Dueño</title>
    <link rel="stylesheet" href="../Assets/css/bootstrapv5.2.1.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="container col-md-10">
            <h2>Resultado la busqueda:</h2>
            <div class="mb-3">
                <?php
                if ($dataAuto != null) {
                    if (count($datosPersona) == 1) {
                        $datosModificados = ["Patente" => $data["Patente"], "DniDuenio" => $data["DniDuenio"], "Marca" => $dataAuto[0]->getMarca(), "Modelo" => $dataAuto[0]->getModelo()];
                        if ($arrayAuto->Edit($datosModificados)) {
                            echo '<p>Los datos sean cambiado</p>';
                        } else {
                            echo '<p>No ingrese los mismos datos</p>';
                        }
                    } else {
                        echo '<p>La persona no existe en la BD</p>';
                    }
                } else {
                    echo ' <p>El auto no existe en la BD</p>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
<?php
include_once("../Structure/footer.php")
?>