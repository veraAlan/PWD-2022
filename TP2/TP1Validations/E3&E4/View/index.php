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

<style>
    input {
        margin: 10px 0px;
        border-color: 0.7px solid gray;
    }
</style>

<body>
    <div class="container-flex m-2 w-25">
        <form class="needs-validation" action="../Controller/presentacion.php" method="POST">
            <legend>Ingrese sus datos</legend>
            <div class="col-auto">
                <label for="name">Nombre: </label>
                <input type="text" name="name" id="name" required>
                <div class="invalid-feedback">
                    Ingrese un nombre válido.
                </div>
            </div>
            <div class="col-auto">
                <label for="surname">Apellido: </label>
                <input type="text" name="surname" id="surname" required>
                <div class="invalid-feedback">
                    Ingrese un apellido válido.
                </div>
            </div>
            <div class="col-auto">
                <label for="age">Edad: </label>
                <input type="text" name="age" id="age" required>
                <div class="invalid-feedback">
                    Ingrese una edad.
                </div>
            </div>
            <div class="col-auto">
                <label for="dir">Direccion: </label>
                <input type="text" name="dir" id="dir" required>
                <div class="invalid-feedback">
                    Ingrese una dirección.
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