<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Subir un Texto</title>
</head>

<body>
    <div class="container p-5">
        <form action="../Control/texto.php" method="POST" enctype="multipart/form-data">
            <input type="file" id="archivo" name="archivo" placeholder="Ingrese un archivo">
            <button type="submit" id="Enviar" disabled>Enviar</button>
        </form>
    </div>

    <script>
        (() => {
            const input = document.querySelector('#archivo')
            const button = document.querySelector("#Enviar")

            input.addEventListener('change', event => {
                input.files[0].name == undefined ? event.stopPropagation() : button.setAttribute("disabled", "")
                if (input.files[0].name.split('.').pop() == "txt") { button.removeAttribute("disabled", "") } else alert("El archivo tiene que ser .txt")
            })
        })()
    </script>
</body>

</html>