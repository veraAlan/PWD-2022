<?php
include_once("../../config.php");
if ($_SESSION['idrol'] >= 2) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>

    <style>
        body {
            background: #ffe259;
            background: linear-gradient(to right, #ffa751, #ffe259);
        }
    </style>

    <!-- Validation for creating a product -->
    <script>
        function formSubmit() {
            valid = checkValidity();
            if (valid) {
                setTimeout(function() {
                    document.getElementById("pCreate").submit();
                }, 500);
            }
        }

        function checkValidity() {
            valid = true;
            id = document.getElementById("idproducto");
            nombre = document.getElementById("pronombre");
            detalle = document.getElementById("prodetalle");
            stock = document.getElementById("procantstock");
            precio = document.getElementById("proprecio");

            if (id.value.length <= 6) {
                id.classList.remove("is-invalid");
                id.classList.add("is-valid");
            } else {
                id.classList.remove("is-valid");
                id.classList.add("is-invalid");
                valid = false;
            }

            if (nombre.value.length <= 35 && nombre.value.length > 0) {
                nombre.classList.remove("is-invalid");
                nombre.classList.add("is-valid");
            } else {
                nombre.classList.remove("is-valid");
                nombre.classList.add("is-invalid");
                valid = false;
            }

            if (detalle.value.length != 0) {
                detalle.classList.remove("is-invalid");
                detalle.classList.add("is-valid");
            } else {
                detalle.classList.remove("is-valid");
                detalle.classList.add("is-invalid");
                valid = false;
            }

            if (stock.value > 0) {
                stock.classList.remove("is-invalid");
                stock.classList.add("is-valid");
            } else {
                stock.classList.remove("is-valid");
                stock.classList.add("is-invalid");
                valid = false;
            }

            if (precio.value.length != 0) {
                precio.classList.remove("is-invalid");
                precio.classList.add("is-valid");
            } else {
                precio.classList.remove("is-valid");
                precio.classList.add("is-invalid");
                valid = false;
            }
            return valid;
        }
    </script>
</head>

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <main class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="../Img/logo.svg" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Bienvenido</h4>
                                    </div>

                                    <h4 class="mb-3">Completar:</h4>
                                    <form method="POST" action="./ActionDepo.php" name="pCreate" id="pCreate">
                                        <input id="action" name="action" value="create" type="hidden">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="pronombre" class="form-label">Nombre</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" class="form-control" name="pronombre" id="pronombre" placeholder="Nombre Producto">
                                                </div>
                                            </div>

                                            <div class=" col-12">
                                                <label for="prodetalle" class="form-label">Detalle</label>
                                                <input type="text" class="form-control" name="prodetalle" id="prodetalle" placeholder="Detalle">
                                            </div>

                                            <div class=" col-12">
                                                <label for="idproducto" class="form-label">Id producto (OPCIONAL)</label>
                                                <input type="number" id="idproducto" class="form-control" placeholder="ID" value="0">
                                            </div>

                                            <div class="col-12">
                                                <label for="procantstock" class="form-label">Cantidad Stock</label>
                                                <input type="number" class="form-control" name="procantstock" id="procantstock" value="0" placeholder="Cantidad Stock">
                                            </div>

                                            <div class=" col-12">
                                                <label for="proprecio" class="form-label">Precio</label>
                                                <input type="number" class="form-control" name="proprecio" id="proprecio" placeholder="Precio">
                                            </div>

                                            <div class=" mb-3">
                                                <label for="formFile" class="form-label">Cargar Imagen (OPCIONAL)</label>
                                                <input class="form-control" type="file" id="urlimage" name="urlimage">
                                            </div>

                                            <hr class="my-4">

                                            <h5>Revise los cambios antes de enviarlos.</h5>
                                            <button class="w-100 btn btn-primary btn-lg" type="button" onclick="formSubmit()">Realizar cambios</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>