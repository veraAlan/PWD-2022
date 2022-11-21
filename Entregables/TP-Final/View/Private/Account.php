<?php
include_once("../../config.php");

$usuario = new Usuario();
$usuario->setIdUsuario($_SESSION['idusuario']);
$usuario->Load();

$roles = new Rol();
$rolesArray = $roles->List();

$usuarioRol = new UsuarioRol();
$usuarioRol->SetearEnKey($_SESSION['idusuario']);
$usuarioRol->Load();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas del Sitio</title>

    <script>
        function formSubmit() {
            if (checkValidity()) {
                var password = document.getElementById("uspass").value;
                if (password != "") {
                    var passhash = CryptoJS.MD5(password).toString();
                    document.getElementById("uspass").value = passhash;
                }
                setTimeout(function() {
                    document.getElementById("modifier").submit();

                }, 500);
            }
        }

        function checkValidity() {
            valid = false;
            pass = document.getElementById("uspass");
            passF = document.getElementById("passForm");

            if (pass.value != "" && passF.value != "") {
                if (passF.value.length > 5 && passF.value.length < 20) {
                    passF.classList.remove("is-invalid");
                    passF.classList.add("is-valid");
                    if (pass.value == passF.value) {
                        pass.classList.remove("is-invalid");
                        pass.classList.add("is-valid");
                        valid = true;
                    } else {
                        pass.classList.remove("is-valid");
                        pass.classList.add("is-invalid");
                    }
                } else {
                    passF.classList.remove("is-valid");
                    passF.classList.add("is-invalid");
                    pass.classList.remove("is-valid");
                    pass.classList.add("is-invalid");
                }
            } else {
                passF.classList.add("is-valid");
                passF.classList.remove("is-invalid");
                pass.classList.add("is-valid");
                pass.classList.remove("is-invalid");
                valid = true;
            }

            return valid;
        }
    </script>
</head>

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <div class="container text-center pt-5 justify-content-center">
        <h1 class="text-start py-3">
            Cambia los datos de tu cuenta.
            <hr>
        </h1>
        <h2>
            <?php
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
            ?>
        </h2>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Modificar uno o mas:</h4>
                <form method="POST" action="Action.php" name="modifier" id="modifier">
                    <input id="accAction" name="accAction" value="modify" type="hidden">
                    <input id="idvalue" name="idusuario" value="<?php echo $usuario->getIdUsuario(); ?>" type="hidden">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="usnombre" class="form-label">Nombre</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="usnombre" id="usnombre" placeholder="<?php echo $usuario->getUsNombre(); ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="usmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="usmail" id="usmail" placeholder="<?php echo $usuario->getUsMail(); ?>" onchange="validate()">
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="passForm">Contraseñia</label>
                            <input type="password" id="passForm" class="form-control" placeholder="*************" />
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="passForm">Repita su contraseñia</label>
                            <input type="password" id="uspass" name="uspass" class="form-control" placeholder="*************" />
                            <div class="invalid-feedback">
                                Tiene que ser igual a la contraseña ingresada anteriormente.
                            </div>
                        </div>

                        <hr class="my-4">

                        <h5>Revise los cambios antes de enviarlos.</h5>
                        <button class="w-100 btn btn-primary btn-lg" type="button" onclick="formSubmit()">Realizar cambios</button>
                </form>

                <hr class="my-4">

                <form method="POST" action="Action.php" name="drop" id="drop">
                    <input id="accAction" name="accAction" value="delete" type="hidden">
                    <input id="idvalue" name="idusuario" value="<?php echo $usuario->getIdUsuario(); ?>" type="hidden">
                    <button class="w-100 btn btn-primary btn-lg" type="submit" onclick="">Eliminar cuenta</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>