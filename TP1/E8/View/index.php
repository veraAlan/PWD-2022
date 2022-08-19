<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Cinem@s</title>
</head>

<body>
    <form action="../Controller/precio.php" method="GET">
        Edad: <input type="number" id="age" name="age" value="0"><br />
        Es un estudiante: <select id="student" name="student">
            <option value="yes">Si</option>
            <option value="no">No</option>
        </select><br />
        <input type="submit" value="Calcular precio...">
    </form>
</body>

</html>