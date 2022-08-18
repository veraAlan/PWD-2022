<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Ingrese sus datos.</h1>
    <br />
    <form action="../Controller/presentacion.php" method="POST">
        Nombre: <input type="text" name="nombre" id="nombre"><br />
        Apellido: <input type="text" name="apellido" id="apellido"><br />
        Edad: <input type="number" name="edad" id="edad"><br />
        <fieldset style="width: 250px">
            <legend>Seleccione su nivel de estudios:</legend>

            <div>
                <input type="radio" id="wo-studies" name="wo-studies" value="wo-studies" checked>
                <label for="wo-studies">Sin estudios</label>
            </div>

            <div>
                <input type="radio" id="primary" name="primary" value="primary">
                <label for="primary">Estudios primarios</label>
            </div>

            <div>
                <input type="radio" id="secondary" name="secondary" value="secondary">
                <label for="secondary">Estudios Secundarios</label>
            </div>
        </fieldset>
        <label for="sexo">Seleccione su sexo: </label>
        <select id="sexo" name="sexo">
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
            <option value="otro" selected>Otro</option>
        </select><br />
        Direccion: <input type="text" name="direccion" id="direccion"><br />

        <input type="submit" value="Enviar" name="submit" onclick="return validate()">
    </form>

    <script type="text/javascript">
        function validate() {
            names = ["nombre", "apellido", "edad", "direccion"];
            verified = true;

            // Iterates through all inputs and checks .
            for (i = 0; i < 4; i++) {
                console.log(document.getElementById(names[i]));
                if (document.getElementById(names[i]).value == "") {
                    document.getElementById(names[i]).style.borderColor = "red";
                    verified = false;
                } else {
                    document.getElementById(names[i]).style.borderColor = "";
                }
            }

            return verified;
        }
    </script>
</body>

</html>