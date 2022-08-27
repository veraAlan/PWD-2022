<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Horarios de clase</title>
</head>

<body>
    <div class="container">
        <h1>Ingrese los horarios de Programacion Web Dinamica.</h1>
        <br />

        <form class="w-25" action="../Control/hsTotales.php" method="GET">
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

        <div class="col-auto pt-2">
            <form action="../../../../Menu/tps.html">
                <button type="submit" class="btn btn-primary">Volver al Menu</button>
            </form>
        </div>
    </div>
</body>

</html>