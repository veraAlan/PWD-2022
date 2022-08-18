<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../../bootstrap-5.2.0-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../bootstrap-5.2.0-dist/css/bootstrap.min.css.map" rel="stylesheet">
    <script src="../../../bootstrap-5.2.0-dist/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Document</title>
</head>

<body>
    <h1>Ver si numero es positivo, cero o negativo.</h1>
    <br />
    <div class="row g-3 align-items-center">
        <form action="../Controller/vernumero.php" method="GET" onsubmit="return validate()">
            <div class="col-auto">
                <label class="col-form-label">Ingrese un numero: </label>
            </div>
            <div class="col-auto">
                <input type="number" name="value" id="value" value="0"><br />
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function validate(){
            input = true;
            if(document.querySelector("#value").value == ""){
                input = false;
                document.querySelector("#value").style.borderColor = "red";
            }
            return input;
        }
    </script>
</body>

</html>