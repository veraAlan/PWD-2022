<?php
include_once("../../config.php");
$datos = data_submitted();

// TODO Product Loader
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
</head>

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <!-- Items -->
    <div class="container text-center pt-5">
        <h1 class="text-start py-3">
            Cuenta a modificar
            <hr>
        </h1>
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Ingresar uno o mas cambios:</h4>
                <form method="POST" action="Action.php" name="modifier" id="modifier">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="username" class="form-label">Nombre</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" name="usnombre" id="username" placeholder="<?php echo $usuario->getUsNombre(); ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="usmail" class="form-label">Email</label>
                            <input type="email" class="form-control" name="usmail" id="usmail" placeholder="<?php echo $usuario->getUsMail(); ?>">
                        </div>

                        <div class="col-12">
                            <label for="idusuario" class="form-label">Id Usuario</label>
                            <input type="text" class="form-control" name="idusuario" id="idusuario" placeholder="<?php echo $usuario->getIdUsuario(); ?>">
                        </div>

                        <div class="col-12">
                            <label for="uspass" class="form-label">Contraseña</label>
                            <input type="text" class="form-control" name="uspass" id="uspass" placeholder="Contraseña">
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Rol</h4>

                    <div class="my-3">
                        <?php
                        foreach ($rolesArray as $rol) {
                            echo '<div class="form-check">
                                <input id="rol' . $rol->getRolDescripcion() . '" name="idrol" type="radio" class="form-check-input"';
                            if ($rol->getIdRol() == $usuarioRol->getRol()->getIdRol()) {
                                echo 'checked><label class="form-check-label" for="' . $rol->getRolDescripcion() . '">';
                            } else {
                                echo '><label class="form-check-label" for="' . $rol->getRolDescripcion() . '">';
                            }
                            echo $rol->getRolDescripcion() . '</label>
                            </div>';
                        }
                        ?>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Realizar cambios</button>
                </form>
            </div>
        </div>

    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>