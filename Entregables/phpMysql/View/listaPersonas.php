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
    <?php
    include("Structure/header.php");
    include_once("../config.php");
    $personaObj = new CPersona();
    $arrayPersonas = $personaObj->Search(null);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="container">
                        <h2 class="text-white py-4">
                            Lista de personas en la base de datos.
                        </h2>

                        <?php
                        if (isset($arrayPersonas)) {
                            echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center m-auto">';
                            foreach ($arrayPersonas as $persona) {
                                // Auto data
                                echo '<div class="card bg-dark m-3 border-white" style="width: 18rem;"><div class="card-body">';
                                echo '<h5 class="card-title bg-dark text-white">Dueño: ' . $persona->getNombre() . ' ' . $persona->getApellido() . "</h5>";
                                echo '<a href="autosPersona.php?NroDni=' . $persona->getNroDni() . '">Ver Autos</a>';
                                echo '</div><ul class="list-group list-group-flush">
                                    <li class="list-group-item bg-dark text-white border-white">DNI: ' . $persona->getNroDni() .
                                    '</li><li class="list-group-item bg-dark text-white border-white">Fecha Nacimiento: ' . $persona->getfechaNac() .
                                    '</li><li class="list-group-item bg-dark text-white border-white">Telefono: ' . $persona->getTelefono() .
                                    '</li><li class="list-group-item bg-dark text-white border-white">Domicilio: ' . $persona->getDomicilio() .
                                    '</li></ul></div>';
                            }
                        } else {
                            echo '<h3>No hay autos cargados en la base de datos.</h3>';
                        }
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("Structure/footer.php") ?>
</body>

</html>