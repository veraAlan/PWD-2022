<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/css/style.css">
    <link rel="stylesheet" href="./Assets/css/bootstrapv5.2.1.min.css"">
    <title>Menu</title>
</head>

<body>
    <?php
    include "../config.php";
    include_once("../View/Structure/header.php");
    ?>
    <div class=" container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-content">
                <div class="container text-center">
                    <h2>Menu</h2>
                    <ul class="nav w-100">
                        <li><a href="./NuevaPersona.php"><button type="button" class="btn btn-pink text-white m-2">Agregar Persona</button></a></li>
                        <li><a href="./NuevoAuto.php"><button type="button" class="btn btn-pink text-white m-2">Agregar Auto</button></a></li>
                        <li><a href="./BuscarPersona.php"><button type="button" class="btn btn-pink text-white m-2">Modificar Persona</button></a></li>
                        <li><a href="./CambioDuenio.php"><button type="button" class="btn btn-pink text-white m-2">Modificar Dueño de Auto</button></a></li>
                        <li><a href="#"><button type="button" class="btn btn-secondary m-2" disabled>Eliminar Persona</button></a></li>
                        <li><a href="#"><button type="button" class="btn btn-secondary m-2" disabled>Eliminar Auto</button></a></li>
                        <li><a href="./listaPersonas.php"><button type="button" class="btn btn-pink text-white m-2">Listar Persona</button></a></li>
                        <li><a href="./VerAutos.php"><button type="button" class="btn btn-pink text-white m-2">Listar Auto</button></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    include_once("./Structure/footer.php")
    ?>
    </body>

</html>