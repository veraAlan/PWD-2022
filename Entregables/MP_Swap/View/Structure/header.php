<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="View/Assets/css/style.css">
    <script src="View/Assets/js/bootstrap.min.js"></script>
    <script src="View/Assets/js/bootstrap.bundle.js"></script>
    <title>Menu</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
            <div class="container-fluid">
                <div>
                    <img class="me-3" src="View/img/logo.svg" alt="" width="75px">
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="btn-group dropstart position-relative end-0 me-5">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Moneda de Cambio
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php">Peso Argentino</a></li>
                    <li><a class="dropdown-item" href="index.php?currency=USD">Dolar</a></li>
                    <li><a class="dropdown-item" href="index.php?currency=EUR">Euro</a></li>
                    <li><a class="dropdown-item" href="index.php?currency=GPB">Libra</a></li>
                </ul>
            </div>
        </nav>
    </header>