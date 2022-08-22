<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Ingrese los horarios de Programacion Web Dinamica.</h1>
        <br />

        <form class="w-25" action="../Controller/hsTotales.php" method="GET">
            <div class="col m-2">
                Lunes: <input class="w-100" type="time" name="lunes" id="lunes">
            </div>
            <div class="col m-2">
                Martes: <input class="w-100" type="time" name="martes" id="martes">
            </div>
            <div class="col m-2">
                Miercoles: <input class="w-100" type="time" name="miercoles" id="miercoles">
            </div>
            <div class="col m-2">
                Jueves: <input class="w-100" type="time" name="jueves" id="jueves">
            </div>
            <div class="col m-2">
                Viernes: <input class="w-100" type="time" name="viernes" id="viernes">
            </div>

            <button class="btn btn-primary w-100" type="submit" name="submit">Ver Horas totales...</button>
        </form>
    </div>
</body>

</html>