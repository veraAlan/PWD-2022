<?php
include_once("../../config.php");

$roles = new CRol();
$rolesArray = $roles->List();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap 5.2.2-->
    <link rel="stylesheet" href="../Assets/css/bootstrap.min.css">
    <script src="../Assets/js/bootstrap.bundle.min.js"></script>
    <!--jQuery 3.6.1-->
    <script src="../Assets/js/jquery-3.6.1.min.js"></script>
    <!--Style-->
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/styleLogin.css">
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/1d6f0eb646.js" crossorigin="anonymous"></script>
    <title>Inicio</title>

    <style>
        body {
            background: #ffe259;
            background: linear-gradient(to right, #ffa751, #ffe259);
        }
    </style>

    <script>
        function formSubmit() {
            valid = checkValidity();
            if (valid) {
                var password = document.getElementById("uspass").value;

                if (password == document.getElementById("passForm").value) {
                    var passhash = CryptoJS.MD5(password).toString();
                    document.getElementById("uspass").value = passhash;

                    setTimeout(function() {
                        document.getElementById("regForm2").submit();

                    }, 500);
                }
            }
        }

        function checkValidity() {
            valid = true;
            nombre = document.getElementById("usnombre");
            mail = document.getElementById("usmail");
            passF = document.getElementById("passForm");
            pass = document.getElementById("uspass");

            if (nombre.value.match(/^[A-Za-z\s]+$/) && nombre.value.length <= 25) {
                nombre.classList.remove("is-invalid");
                nombre.classList.add("is-valid");
            } else {
                nombre.classList.remove("is-valid");
                nombre.classList.add("is-invalid");
                valid = false;
            }

            if (mail.value.match(/^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/, "gm")) {
                mail.classList.remove('is-invalid');
                mail.classList.add('is-valid');
            } else {
                mail.classList.remove("is-valid");
                mail.classList.add("is-invalid");
                valid = false;
            }

            if (passF.value.length > 5 && passF.value.length < 20) {
                passF.classList.remove("is-invalid");
                passF.classList.add("is-valid");
                if (pass.value == passF.value) {
                    pass.classList.remove("is-invalid");
                    pass.classList.add("is-valid");
                } else {
                    pass.classList.remove("is-valid");
                    pass.classList.add("is-invalid");
                    valid = false;
                }
            } else {
                passF.classList.remove("is-valid");
                passF.classList.add("is-invalid");
                pass.classList.remove("is-valid");
                pass.classList.add("is-invalid");
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

                                    <form method="POST" action="./Action.php" name="regForm2" id="regForm2">
                                        <p>Contanos quien sos</p>
                                        <span></span>
                                        <input class="action" name="action" value="register" type="hidden">

                                        <div class="form-outline mb-4">
                                            <input type="text" id="usnombre" name="usnombre" class="form-control" placeholder="Juancito Perez" />
                                            <label class="form-label" for="usnombre">Nombre</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" id="usmail" name="usmail" class="form-control" placeholder="mail@mail.com" />
                                            <label class="form-label" for="usmail">Email</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="passForm" class="form-control" placeholder="*************" />
                                            <label class="form-label" for="passForm">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="uspass" name="uspass" class="form-control" placeholder="*************" />
                                            <label class="form-label" for="uspass">Password</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <?php
                                            $i = 0;
                                            foreach ($rolesArray as $rol) {
                                                echo '<div class="form-check">
                                                        <input id="rol' . $rol->getRolDescripcion() . '" name="idrol" type="radio" class="form-check-input" value="' . $rol->getIdRol() . '"';
                                                if ($i == 0) {
                                                    echo 'checked><label class="form-check-label" for="' . $rol->getRolDescripcion() . '">';
                                                    $i++;
                                                } else {
                                                    echo '><label class="form-check-label" for="' . $rol->getRolDescripcion() . '">';
                                                }
                                                echo $rol->getRolDescripcion() . '</label></div>';
                                            }
                                            ?>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-outline-danger" type="button" id="regButton" onclick="formSubmit()">Register</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 text-center">VASA</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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