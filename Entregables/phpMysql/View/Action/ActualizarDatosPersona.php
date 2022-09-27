<?php
include_once("../../config.php");
$data = data_submitted();
$personaObj = new CPersona();
include_once("../Structure/header.php");
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
                            if ($personaObj != null) {
                                $newData = ['Nombre' => $data['Nombre'], 'Apellido' => $data['Apellido'], 'NroDni' => $data['NroDni'],  'fechaNac' => $data['fechaNac'], 'Telefono' => $data['Telefono'], 'Domicilio' => $data['Domicilio']];
                                if ($personaObj->Edit($newData)) {
                                    echo '<p>Los datos fueron cambiados con éxito.</p>';
                                } else {
                                    echo '<p>No hubo cambios.</p>';
                                }
                            } else {
                                echo '<p>La persona no existe en la BD</p>';
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