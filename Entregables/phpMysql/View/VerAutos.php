<?php
include_once("../config.php");
$autoObj = new CAuto();
$arrayAutos = $autoObj->Search(null);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrapv5.2.1.min.css">
    <title>Ver Autos</title>
</head>

<body class="bg-dark">
    <div class="container bg-dark">
        <!-- TODO Include inside new responsive menu -->
        <h2 class="text-white py-4">
            Lista de autos en la base de datos.
        </h2>

        <?php
        if (isset($arrayAutos)) {
            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center m-auto">';
            foreach ($arrayAutos as $auto) {
                // Auto data
                echo '<div class="card bg-dark m-3 border-white" style="width: 18rem;"><div class="card-body">';
                echo '<h5 class="card-title bg-dark text-white">Dueño: ' . $auto->getDuenio()->getNombre() . ' ' . $auto->getDuenio()->getApellido() . "</h5>";
                echo '</div><ul class="list-group list-group-flush">
                        <li class="list-group-item bg-dark text-white border-white">Patente: ' . $auto->getPatente() .
                    '</li><li class="list-group-item bg-dark text-white border-white">Modelo: ' . $auto->getModelo() .
                    '</li><li class="list-group-item bg-dark text-white border-white">Marca: ' . $auto->getMarca() .
                    '</li></ul></div>';
            }
        } else {
            echo '<h3>No hay autos cargados en la base de datos.</h3>';
        }
        echo '</div>';
        ?>
    </div>
</body>

</html>