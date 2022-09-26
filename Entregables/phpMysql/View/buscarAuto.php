<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/bootstrapv5.2.1.min.css">
    <title>Buscar Auto</title>
</head>

<body>
    <?php include("Structure/header.php") ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <form action="Action/accionBuscarAuto.php" method="GET">
                        <div class="mb-3">
                            <label for="patenteInput" class="form-label text-white">Patente: </label>
                            <input type="text" class="form-control" id="xPatente" name="xPatente" onchange="verification(this)">
                            <div id="PatenteHelp" class="form-text">La patente sigue el formato: AAA-000.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="Assets/js/jquery-3.6.1.min.js"></script>
    <?php include_once("Structure/footer.php") ?>
</body>

</html>