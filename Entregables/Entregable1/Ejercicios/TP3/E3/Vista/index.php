<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Ref -->
    <script src="https://kit.fontawesome.com/030b0c9fc7.js" crossorigin="anonymous"></script>
    <style>
        header {
            background: rgb(203, 203, 203);
            background: linear-gradient(0deg, rgba(203, 203, 203, 1) 0%, rgba(255, 255, 255, 1) 100%, rgba(242, 242, 242, 1) 100%);
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="container p-0 my-5 shadow border rounded">
        <header class="navbar navbar-expand-sm border shadow-pop">
            <div class="container">
                <h4 class="text-primary"><i class="fas fa-external-link"></i> <strong>Cinem@as</strong></h4>
            </div>
        </header>
        <div class="p-4 col-md col-lg">
            <form action="../Control/formulario.php" method="POST" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label for="titulo" class="form-label"><strong>Titulo</strong></label>
                        <input type="text" class="form-control" id="Titulo" name="Titulo" placeholder="Titulo" value="" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="actores" class="form-label"><strong>Actores</strong></label>
                        <input type="text" class="form-control" id="Actores" name="Actores" placeholder="Actores" value="" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="director" class="form-label"><strong>Director</strong></label>
                        <input type="text" class="form-control" id="Director" name="Director" placeholder="Directores" value="" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="guion" class="form-label"><strong>Guion</strong></label>
                        <input type="text" class="form-control" id="Guion" name="Guion" placeholder="Guion" value="" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="produccion" class="form-label"><strong>Produccion</strong></label>
                        <input type="text" class="form-control" id="Produccion" name="Produccion" placeholder="" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="anio" class="form-label"><strong>Año</strong></label>
                        <input type="number" class="form-control" id="Año" name="Año" placeholder="" oninput="maxXdigits(this, 4)" required>
                        <div class="invalid-feedback">
                            Tiene que ser un maximo de 4 digitos.
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="nacionalidad" class="form-label"><strong>Nacionalidad</strong></label>
                        <input type="text" class="form-control" id="Nacionalidad" name="Nacionalidad" placeholder="" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="genero" class="form-label"><strong>Genero</strong></label>
                        <select class="form-select" aria-label="genero" id="Genero" name="Genero">
                            <option selected>...</option>
                            <option value="comedia">Comedia</option>
                            <option value="drama">Drama</option>
                            <option value="terror">Terror</option>
                            <option value="romanticas">Romanticas</option>
                            <option value="suspenso">Suspenso</option>
                            <option value="otro">Otros</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="duracion" class="form-label"><strong>Duracion</strong></label>
                        <input type="number" class="form-control" id="Duracion" name="Duracion" placeholder="" oninput="maxXdigits(this, 3)" required>
                        <div class="position-absolute">
                            (minutos)
                        </div>
                        <div class="invalid-feedback position-absolute pt-3">
                            Tiene que ser un maximo de 3 digitos.
                        </div>
                    </div>
                    <div class="col-sm-6 ps-4">
                        <div class="row">
                            <label for="restriccion" class="form-label mb-3"><strong>Restricciones de edad</strong></label>
                        </div>
                        <div class="row ps-4">
                            <div class="form-check col-sm-3">
                                <input id="Restriccion de edad" name="Restriccion de edad" type="radio" class="form-check-input" value="Apto para todo publico" checked="" required>
                                <label class="form-check-label"> Todo Publico</label>
                            </div>
                            <div class="form-check  col-sm-4">
                                <input id="Restriccion de edad" name="Restriccion de edad" type="radio" class="form-check-input" value="Mayores de 7 años" required>
                                <label class="form-check-label"> Mayores de 7 años</label>
                            </div>
                            <div class="form-check  col-sm-4">
                                <input id="Restriccion de edad" name="Restriccion de edad" type="radio" class="form-check-input" value="Mayores de 18 años" required>
                                <label class="form-check-label"> Mayores de 10 años</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"><strong>Cargar Imagen</strong></label>
                        <input class="form-control" type="file" id="imagen" name="imagen" placeholder="">
                    </div>
                </div>
                <div class="row g-3 pt-4 mt-3">
                    <div class="col-sm">
                        <div class="mb-3">
                            <label for="sinopsis" class="form-label"><strong>Sinopsis</strong></label>
                            <textarea id="sinopsis" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-primary me-2" type="submit">Enviar</button>
                    <button class="btn btn-light btn-outline-dark" type="reset">Borrar</button>
                </div>
            </form>

            <div class="col-auto pt-2">
                <form action="../../../../Menu/tps.html">
                    <button type="submit" class="btn btn-primary">Volver al Menu</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function maxXdigits(element, maxLength) {
            num = element.value.length
            if (num > maxLength) {
                element.value = element.value.slice(0, maxLength)
            }
        }
    </script>
</body>

</html>