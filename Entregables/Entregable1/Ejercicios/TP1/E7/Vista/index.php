<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Calculadora</title>
</head>

<body>
    <div class="container-md w-auto pt-3">
        <form class="needs-validation row g-3" action="../Control/calculator.php" method="GET">
            <div class="col-md-6">
                <label for="validationDefault01" class="form-label">
                    <h2>Primer numero</h2>
                </label>
                <input type="number" class="form-control" id="stValue" name="stValue" value="0" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefault02" class="form-label">
                    <h2>Segundo Numero</h2>
                </label>
                <input type="number" class="form-control" id="ndValue" name="ndValue" value="0" required>
            </div>
            <div class="col-md-6">
                <select class="form-select" id="operand" name="operand" required>
                    <option selected disabled value="">Operacion</option>
                    <option value="sum">Suma</option>
                    <option value="sub">Resta</option>
                    <option value="mult">Multiplicacion</option>
                    <option value="div">Division</option>
                </select>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary w-100" type="submit">Calcular...</button>
            </div>
        </form>

        <div class="col-auto pt-2">
            <form action="../../../../Menu/tps.html">
                <button type="submit" class="btn btn-primary">Volver al Menu</button>
            </form>
        </div>
    </div>
</body>

</html>