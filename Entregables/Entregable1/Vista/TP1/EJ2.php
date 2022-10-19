<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>

<body>
    <!-- Agregar header a la pagina. -->
    <? include_once("../Estructura/header.php") ?>

    <!-- Form de horarios -->
    <h1>Ingrese los horarios de Programacion Web Dinamica.</h1>
    <br />

    <form action="EJ1_horasTotales.php" method="GET">
        <div>
            Lunes: <input type="time" name="lunes" id="lunes">
        </div>
        <div>
            Martes: <input type="time" name="martes" id="martes">
        </div>
        <div>
            Miercoles: <input type="time" name="miercoles" id="miercoles">
        </div>
        <div>
            Jueves: <input type="time" name="jueves" id="jueves">
        </div>
        <div>
            Viernes: <input type="time" name="viernes" id="viernes">
        </div>

        <button type="submit" name="submit">Ver Horas totales...</button>
    </form>
</body>

</html>