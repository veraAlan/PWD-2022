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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="container text-center">
                        <h2>Menu</h2>
                        <ul class="nav">
                            <li><a href="#">Agregar Persona</a></li>
                            <li><a href="#">Agregar Auto</a></li>
                            <li><a href="#">Modificar Persona</a></li>
                            <li><a href="#">Modificar Auto</a></li>
                            <li><a href="#">Eliminar Persona</a></li>
                            <li><a href="#">Eliminar Auto</a></li>
                            <li><a href="#">Listar Persona</a></li>
                            <li><a href="#">Listar Auto</a></li>
                            </li>
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