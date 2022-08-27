<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Presentacion</title>
</head>

<body>
    <div class="container-flex w-25">
        <form class="needs-validation p-3" action="../Control/presentacion.php" method="POST">

            <legend>Ingrese sus datos</legend>
            <div class="col-auto">
                <label for="nombre">Nombre: </label>
                <input class="w-100 mb-2" type="text" name="nombre" id="nombre" required>
                <div class="invalid-feedback">
                    Ingrese un nombre válido.
                </div>
            </div>
            <div class="col-auto">
                <label for="apellido">Apellido: </label>
                <input class="w-100 mb-2" type="text" name="apellido" id="apellido" required>
                <div class="invalid-feedback">
                    Ingrese un apellido válido.
                </div>
            </div>
            <div class="col-auto">
                <label for="edad">Edad: </label>
                <input class="w-100 mb-2" type="text" name="edad" id="edad" required>
                <div class="invalid-feedback">
                    Ingrese una edad.
                </div>
            </div>
            <div class="col-auto">
                <label for="direccion">Direccion: </label>
                <input class="w-100 mb-2" type="text" name="direccion" id="direccion" required>
                <div class="invalid-feedback">
                    Ingrese una dirección.
                </div>
            </div>

            <div class="col-auto">
                <fieldset class="border p-1">
                    <legend class="w-auto">Seleccione su nivel de estudios:</legend>

                    <div>
                        <input type="radio" id="estudios" name="estudios" value="sin estudios" checked>
                        <label for="estudios">Sin estudios</label>
                    </div>

                    <div>
                        <input type="radio" id="estudios" name="estudios" value="primario">
                        <label for="estudios">Estudios primarios</label>
                    </div>

                    <div>
                        <input type="radio" id="estudios" name="estudios" value="secundario">
                        <label for="estudios">Estudios Secundarios</label>
                    </div>
                </fieldset>
            </div>

            <div class="col-auto pt-4">
                <label for="sexo">Seleccione su sexo: </label>
                <select id="sexo" name="sexo">
                    <option value="femenino">Femenino</option>
                    <option value="masculino">Masculino</option>
                    <option value="otro" selected>Otro</option>
                </select>
            </div>

            <div class="col-auto pt-4">
                <label for="deportes">Que deportes realiza?</label><br />
                <div class="row-cols-2">
                    <div class="col-auto">
                        <input class="w-25" type="checkbox" name="deportes[]" value="futbol">Futbol
                        <input class="w-25" type="checkbox" name="deportes[]" value="basket">Basket
                    </div>
                    <div class="col-auto">
                        <input class="w-25" type="checkbox" name="deportes[]" value="tennis">Tennis
                        <input class="w-25" type="checkbox" name="deportes[]" value="voley">Voley
                    </div>
                </div>
            </div>

            <div class="col-auto">
                <button class="btn btn-primary" type="submit">Enviar datos</button>
            </div>
        </form>
    </div>
</body>

</html>