<?php
include_once("../../config.php");

$formData = data_submitted();
$autoObj = new CAuto();
$array['Patente'] = $formData['xPatente'];
$auto = $autoObj->LoadObjCl($array);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/bootstrapv5.2.1.min.css">
    <link rel="stylesheet" href="../../View/Assets/css/style.css">
    <title>Ver Autos</title>
</head>

<body>
    <?php include("../Structure/header.php") ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="container text-white">

                        <?php
                        if (!empty($auto)) {
                            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center m-auto">';
                            // Auto data
                            echo '<div class="card bg-dark m-3 border-white w-100" style="width: 18rem;"><div class="card-body">';
                            echo '<h3 class="card-title bg-dark text-white">Dueño: ' . $auto->getDuenio()->getNombre() . ' ' . $auto->getDuenio()->getApellido() . "</h3>";
                            echo '</div><ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-dark text-white border-white">Patente: ' . $auto->getPatente() .
                                '</li><li class="list-group-item bg-dark text-white border-white">Modelo: ' . $auto->getModelo() .
                                '</li><li class="list-group-item bg-dark text-white border-white">Marca: ' . $auto->getMarca() .
                                '</li></ul></div></div>';
                        } else {
                            echo '<h2>No hay ningun auto con la patente ingresada.</h2>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("../Structure/footer.php") ?>
</body>

</html>