<?php
include_once("../config.php");

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
    // Append the host(domain name, ip) to the URL.   
    $url .= $_SERVER['HTTP_HOST'];
    // Append the requested resource location to the URL.
    $url .= $_SERVER['REQUEST_URI'];
}
// Parse url into components array.
$url_components = parse_url($url);
parse_str($url_components['query'], $params);

$personaObj = new CPersona();
$persona = $personaObj->LoadObjCl($params);

$autoObj = new CAuto();
$arrayAutos = $autoObj->SearchD($params);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/bootstrapv5.2.1.min.css">
    <title>Ver Autos</title>
</head>

<body>
    <?php include("Structure/header.php") ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="container">
                        <h2 class="text-white py-4">
                            Lista de autos a cargo de:
                        </h2>

                        <?php
                        if (isset($persona)) {
                            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center m-auto">';
                            // Persona data
                            echo '<div class="card bg-dark m-3 border-white w-100" style="width: 18rem;"><div class="card-body">';
                            echo '<h3 class="card-title bg-dark text-white">Dueño: ' . $persona->getNombre() . ' ' . $persona->getApellido() . "</h3>";
                            echo '</div><ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-dark text-white border-white">DNI: ' . $persona->getNroDni() .
                                '</li><li class="list-group-item bg-dark text-white border-white">Fecha Nacimiento: ' . $persona->getfechaNac() .
                                '</li><li class="list-group-item bg-dark text-white border-white">Telefono: ' . $persona->getTelefono() .
                                '</li><li class="list-group-item bg-dark text-white border-white">Domicilio: ' . $persona->getDomicilio() .
                                '</li></ul></div>';
                            foreach ($arrayAutos as $auto) {
                                // Auto data
                                echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center m-auto">';
                                // Auto data
                                echo '<div class="card bg-dark m-3 border-white w-100" style="width: 18rem;"><div class="card-body">';
                                echo '<h5 class="card-title bg-dark text-white">Patente: ' . $auto->getPatente() . "</h5>";
                                echo '<h5 class="card-title bg-dark text-white">Modelo: ' . $auto->getModelo() . "</h5>";
                                echo '<h5 class="card-title bg-dark text-white">Marca: ' . $auto->getMarca() . "</h5>";
                                echo '</div></div></div>';
                            }
                            echo '</div></div>';
                        } else {
                            echo '<h3>No hay autos cargados en la base de datos.</h3>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("Structure/footer.php") ?>
</body>

</html>