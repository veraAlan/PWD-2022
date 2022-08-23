<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <title>Cine Cinem@s</title>
</head>

<body>
    <div class="container-md w-auto">
        <h2 class="py-4">Precios de las entradas de Cinem@s.</h2>
        <form class="needs-validation row g-2" action="../Controller/precio.php" method="GET">
            <div class="col-md">
                <label for="ageValidation" class="form-label">Edad</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="col-md-6">
                <label for="studentValidation" class="form-label">Es un estudiante?</label>
                <select class="form-select" id="student" name="student" required>
                    <option selected disabled value="">Elegir...</option>
                    <option value="yes">Si</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div class="col-md-12">
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