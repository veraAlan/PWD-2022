<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Numeros</title>
</head>

<body>
    <div class="container p-2">
        <h1>Ver si numero es positivo, cero o negativo.</h1>
        <br />
        <div class="row g-3 align-items-center">
            <form action="../Control/vernumero.php" method="GET">
                <div class="col-auto">
                    <label class="col-form-label">Ingrese un numero: </label>
                </div>
                <div class="col-auto">
                    <input type="number" name="value" id="value" value="0" required><br />
                </div>
                <div class="col-auto pt-2">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>

        <div class="col-auto pt-2">
            <form action="../../../../Menu/tps.html">
                <button type="submit" class="btn btn-primary">Volver al Menu</button>
            </form>
        </div>
    </div>

    <script>
        (function() {
            document.querySelector('#value').addEventListener('change', event => {
                if (inputs[0].value != "") {
                    inputs[0].classList.remove("is-invalid")
                    inputs[0].classList.add("is-valid")
                } else {
                    inputs[0].classList.remove("is-valid")
                    inputs[0].classList.add("is-invalid")
                }
            })
        })
    </script>
</body>

</html>