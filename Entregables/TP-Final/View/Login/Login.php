<?php
include_once("../../config.php");

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
            if (checkInputs()) {
                var password = document.getElementById("uspass").value;
                var passhash = CryptoJS.MD5(password).toString();
                document.getElementById("uspass").value = passhash;
                console.log("Here");

                setTimeout(function() {
                    document.getElementById("form").submit();

                }, 500);
            }
        }

        function checkInputs() {
            valid = true;
            mail = document.getElementById("usmail");
            pass = document.getElementById("uspass");

            if (mail.value.match(/^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/, "gm")) {
                mail.classList.remove('is-invalid');
                mail.classList.add('is-valid');
            } else {
                mail.classList.remove("is-valid");
                mail.classList.add("is-invalid");
                valid = false;
            }

            if (pass.value.length > 5 && pass.value.length < 20) {
                pass.classList.remove('is-invalid');
                pass.classList.add('is-valid');
            } else {
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
                                        <?php
                                        if (data_submitted()) {
                                            echo "<p>" . $_GET['msg'] . "</p>";
                                        }
                                        ?>
                                    </div>

                                    <form method="POST" action="Action.php" name="form" id="form">
                                        <p>Please login to your account</p>
                                        <input id="action" name="action" value="login" type="hidden">

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="usmail">Email</label>
                                            <input type="email" id="usmail" name="usmail" class="form-control" placeholder="Email address" required />
                                            <div class="invalid-feedback">
                                                ingrese un mail valido. EJ: usuario@usuaio.com
                                            </div>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="uspass">Password</label>
                                            <input type="password" id="uspass" name="uspass" class="form-control" required />
                                            <div class="invalid-feedback">
                                                La contraseña tiene que ser de al menos 5 y máximo 20 carácteres.
                                            </div>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <input type="button" class="btn btn-primary btn-block" value="Log in" onclick="formSubmit()">
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="./Register.php"><button type="button" class="btn btn-outline-danger">Create new</button></a>
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