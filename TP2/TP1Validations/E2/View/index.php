<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ingrese los horarios de Programacion Web Dinamica.</h1>
    <br/>
    <form action="../Controller/hsTotales.php" method="GET">
        Lunes: <input type="time" name="lunes" id="lunes"><br/>
        Martes: <input type="time" name="martes" id="martes"><br/>
        Miercoles: <input type="time" name="miercoles" id="miercoles"><br/>
        Jueves: <input type="time" name="jueves" id="jueves"><br/>
        Viernes: <input type="time" name="viernes" id="viernes"><br/>

        <input type="submit" name="submit" text="Ver horas totales">
    </form>
</body>
</html>