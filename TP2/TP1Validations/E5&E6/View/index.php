<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Presentacion</title>
</head>

<body>
    <div class="container-flex w-25">
        <form class="needs-validation p-3" action="../Controller/presentacion.php" method="POST">

            <legend>Ingrese sus datos</legend>
            <div class="col-auto">
                <label for="name">Nombre: </label>
                <input class="w-100 mb-2" type="text" name="name" id="name" required>
                <div class="invalid-feedback">
                    Ingrese un nombre válido.
                </div>
            </div>
            <div class="col-auto">
                <label for="surname">Apellido: </label>
                <input class="w-100 mb-2" type="text" name="surname" id="surname" required>
                <div class="invalid-feedback">
                    Ingrese un apellido válido.
                </div>
            </div>
            <div class="col-auto">
                <label for="age">Edad: </label>
                <input class="w-100 mb-2" type="text" name="age" id="age" required>
                <div class="invalid-feedback">
                    Ingrese una edad.
                </div>
            </div>
            <div class="col-auto">
                <label for="dir">Direccion: </label>
                <input class="w-100 mb-2" type="text" name="dir" id="dir" required>
                <div class="invalid-feedback">
                    Ingrese una dirección.
                </div>
            </div>

            <div class="col-auto">
                <fieldset class="border p-1">
                    <legend class="w-auto">Seleccione su nivel de estudios:</legend>

                    <div>
                        <input type="radio" id="studies" name="studies" value="sin estudios" checked>
                        <label for="wo-studies">Sin estudios</label>
                    </div>

                    <div>
                        <input type="radio" id="studies" name="studies" value="primario">
                        <label for="primary">Estudios primarios</label>
                    </div>

                    <div>
                        <input type="radio" id="studies" name="studies" value="secundario">
                        <label for="secondary">Estudios Secundarios</label>
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
                <label for="deporte">Que deportes realiza?</label><br />
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

    <script type="text/javascript">
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.form(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })

        })()
    </script>
</body>

</html>