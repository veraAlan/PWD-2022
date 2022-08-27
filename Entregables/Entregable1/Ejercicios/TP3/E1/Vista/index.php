<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- JQuery Ref -->
    <script src="../../../../Utilidades/JQuery/js/jquery.js" type="text/javascript"></script>
    <!-- Font Awesome Ref -->
    <script src="https://kit.fontawesome.com/030b0c9fc7.js" crossorigin="anonymous"></script>
    <title>EjercicioN1</title>
</head>

<body>
    <div class="container p-0 my-5 shadow border rounded">
        <header class="navbar navbar-expand-sm border shadow-pop">
            <div class="container">
                <h4 class="text-primary"><i class="fas fa-external-link"></i> <strong>Cargar datos</strong></h4>
            </div>
        </header>
        <div class="p-4 col-md col-lg">
            <form action="../Control/validad.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input class="form-control" type="file" id="archivoInput" name="archivoInput" placeholder="">
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary me-2" type="submit">Enviar</button>
                    <button class="btn btn-light btn-outline-dark" type="reset">Borrar</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        const archivoInput = document.querySelector("#archivoInput")

        archivoInput.addEventListener("change", (event) => {
            $(document).on('change', 'input[type="file"]', function() {
                var fileName = this.files[0].name;
                var fileSize = this.files[0].size;

                if (fileSize > 2000000) {
                    alert('El archivo no debe superar los 2MB');
                    this.value = '';
                    this.files[0].name = '';
                } else {
                    // recuperamos la extensión del archivo
                    var ext = fileName.split('.').pop();

                    // Convertimos en minúscula porque
                    // la extensión del archivo puede estar en mayúscula
                    ext = ext.toLowerCase();

                    // console.log(ext);
                    switch (ext) {
                        case 'doc':
                        case 'pdf':
                            break;
                        default:
                            alert('El archivo no tiene la extensión adecuada');
                            this.value = ''; // reset del valor
                            this.files[0].name = '';
                    }
                }
            });
        });
    </script>
    <script src="../../../bootstrap-5.2.0-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>