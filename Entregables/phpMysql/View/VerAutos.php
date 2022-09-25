<?php
include_once("../config.php");
$autoObj = new CAuto();
$arrayAutos = $autoObj->Search(null);
/* print_r($arrayAutos); */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Autos</title>
</head>

<body>
    <h1>
        Lista de autos en la base de datos.
    </h1>

    <?php
    if (isset($arrayAutos)) {
        foreach ($arrayAutos as $auto) {
            // Auto data
            echo "<fieldset>";
            echo "Patente: " . $auto->getPatente() . "<br>";
            echo "Modelo: " . $auto->getModelo() . "<br>";
            echo "Marca: " . $auto->getMarca() . "<br>";
            echo "<fieldset>";
            // Duenio data
            $duenio = $auto->getDuenio();
            echo "Nombre: " . $auto->getDuenio()->getNroDni() . "<br>";
            echo "Nombre: " . $auto->getDuenio()->getNombre() . "<br>";
            echo "Apellido: " . $auto->getDuenio()->getApellido() . "<br>";
            echo "</fieldset> <br>";
            echo "</fieldset> <br>";
        }
    } else {
        echo "<h3>No hay autos cargados en la base de datos.</h3>";
    }

    ?>


</body>

</html>