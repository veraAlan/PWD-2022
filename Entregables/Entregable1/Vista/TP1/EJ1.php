<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>

<body>
    <!-- Agregar header a la pagina. -->
    <? include_once("../Estructura/header.php") ?>

    <!-- Formulario -->
    <form id="numberForm" action="./EJ1_vernumero.php" method="GET">
        <h1>Ver si numero es positivo, cero o negativo.</h1>
        <label class="col-form-label">Ingrese un numero: </label>
        <input type="number" name="valor" id="valor" value="0" required>
        <button type="submit">Enviar</button>
    </form>

    <!-- Script that can be used for TP2 validations.
    <script>
        $().ready(function() {
            $("#numberForm").validate({
                rules: {
                    valor: {
                        required: true
                    }
                },
                messages: {
                    valor: {
                        required: "Ingrese un valor."
                    }
                }
            })
        })
    </script> -->
</body>

</html>