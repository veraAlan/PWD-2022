<?php
include "../../config.php";
$data = data_submitted();
$autoObj = new CAuto();
$arrayPersona = new CPersona();
$dataAuto = $autoObj->Search($data);
$nroDni["NroDni"] = $data["DniDuenio"];
$datosPersona = $arrayPersona->Search($nroDni);
include_once("../Structure/header.php")
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="container">
                        <h3>Resultado la busqueda:</h3>
                        <div class="my-3">
                            <?php
                            if ($dataAuto != null) {
                                if (count($datosPersona) == 1) {
                                    $datosModificados = ["Patente" => $data["Patente"], "DniDuenio" => $data["DniDuenio"], "Marca" => $dataAuto[0]->getMarca(), "Modelo" => $dataAuto[0]->getModelo()];
                                    if ($autoObj->Edit($datosModificados)) {
                                        echo '<p>Los datos fueron cambiados con éxito.</p>';
                                    } else {
                                        echo '<p>No hubo cambios. El dueño es el mismo.</p>';
                                    }
                                } else {
                                    echo '<p>La persona no existe en la base de datos</p>';
                                }
                            } else {
                                echo '<p>El auto no existe en la base de datos</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once("../Structure/footer.php")
    ?>
</body>

</html>