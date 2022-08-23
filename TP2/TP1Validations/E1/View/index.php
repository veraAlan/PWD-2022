<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Numeros</title>
</head>

<body>
    <h1>Ver si numero es positivo, cero o negativo.</h1>
    <br />
    <div class="row g-3 align-items-center">
        <form action="../Controller/vernumero.php" method="GET">
            <div class="col-auto">
                <label class="col-form-label">Ingrese un numero: </label>
            </div>
            <div class="col-auto">
                <input type="number" name="value" id="value" value="0" required><br />
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Enviar</button>
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