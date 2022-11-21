<?php
include_once("../../config.php");
if ($_SESSION['idrol'] >= 3) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}

$datos = data_submitted();

$usuario = new Usuario();
$usuario->setIdUsuario($datos['idusuario']);
$usuario->Load();

$roles = new Rol();
$rolesArray = $roles->List();

$usuarioRol = new UsuarioRol();
$usuarioRol->SetearEnKey($datos['idusuario']);
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
        function passHash() {
            var password = document.getElementById("uspass").value;
            if (password != "") {
                var passhash = CryptoJS.MD5(password).toString();
                document.getElementById("uspass").value = passhash;
            }
            setTimeout(function() {
                document.getElementById("modifier").submit();

            }, 500);
        }
    </script>
</head>

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <div class="container text-center pt-5 justify-content-center">
        <h1 class="text-start py-3">
            Cuenta a modificar
            <hr>
        </h1>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Modificar uno o mas:</h4>
                <form method="POST" action="Action.php" name="modifier" id="modifier">
                    <input id="accAction" name="accAction" value="modify" type="hidden">
                    <input id="idvalue" name="idusuario" value="<?php echo $usuario->getIdUsuario(); ?>" type="hidden">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="username" class="form-label">Nombre</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="usnombre" id="username" placeholder="<?php echo $usuario->getUsNombre(); ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="usmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="usmail" id="usmail" placeholder="<?php echo $usuario->getUsMail(); ?>" onchange="validate()">
                        </div>

                        <div class="col-12">
                            <label for="idusuario" class="form-label">Id Usuario (No Modificable)</label>
                            <input type="text" class="form-control" placeholder="<?php echo $usuario->getIdUsuario(); ?>" value="<?php echo $usuario->getIdUsuario(); ?>" disabled>
                        </div>

                        <div class="col-12">
                            <label for="uspass" class="form-label">Contraseña</label>
                            <input type="text" class="form-control" name="uspass" id="uspass" placeholder="Contraseña">
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Rol</h4>
                        <div class="my-3">
                            <?php
                            foreach ($rolesArray as $rol) {
                                echo '<div class="form-check">
                                <input id="rol' . $rol->getRolDescripcion() . '" name="idrol" type="radio" class="form-check-input" value="' . $rol->getIdRol() . '"';
                                if ($rol->getIdRol() == $usuarioRol->getRol()->getIdRol()) {
                                    echo 'checked><label class="form-check-label" for="' . $rol->getRolDescripcion() . '">';
                                } else {
                                    echo '><label class="form-check-label" for="' . $rol->getRolDescripcion() . '">';
                                }
                                echo $rol->getRolDescripcion() . '</label></div>';
                            }
                            ?>
                        </div>
                        <div class="form-check">
                            <?php
                            if ($usuario->getUsDeshabilitado() != null) {
                                echo "<p>Ultima vez deshabilitado: " . $usuario->getUsDeshabilitado() . "</p>";
                            }
                            ?>
                            <input type="checkbox" class="form-check-input" id="usdeshabilitado" name="usdeshabilitado" value="<?php echo date("Y/m/d") ?>">
                            <label class="form-check-label" for="usdeshabilitado">Deshabilitar</label>
                        </div>

                        <hr class="my-4">

                        <h5>Revise los cambios antes de enviarlos.</h5>
                        <button class="w-100 btn btn-primary btn-lg" type="submit" onclick="passHash()">Realizar cambios</button>
                </form>
            </div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>