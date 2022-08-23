<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-md w-auto">
        <form class="needs-validation row g-3" action="../Controller/calculator.php" method="GET">
            <div class="col-md-6">
                <label for="validationDefault01" class="form-label">Primer numero</label>
                <input type="number" class="form-control" id="stValue" name="stValue" value="0" required>
            </div>
            <div class="col-md-6">
                <label for="validationDefault02" class="form-label">Segundo Numero</label>
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