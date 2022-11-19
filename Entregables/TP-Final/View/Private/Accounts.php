<?php
include_once("../../config.php");
if ($_SESSION['idrol'] != 9) {
    echo "<h1>Privilegios insuficientes para modificar las cuentas de la base de datos.</h1>";
    exit();
}

$controlObj = new Usuario();
$registry = $controlObj->List();
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
            Cuentas a modificar
        </h1>
        <hr>
        <?php
        if (data_submitted()) {
            echo "<h3>" . $_GET['msg'] . "</h3>";
        }
        ?>
        <br>
        <br>
        <div class="row gy-5">
            <?php
            foreach ($registry as $account) {
                echo '<div class="col-6 p-4">
                            <div class="card-section card-section-first border rounded p-3">
                                <div class="card-header card-header-first rounded h-25 text-white">';
                if ($_SESSION['idusuario'] == $account->getIdUsuario()) {
                    echo '<h2>Cuenta Actual: ' . $account->getUsNombre() . '</h2>';
                } else {
                    echo '<h2>' . $account->getUsNombre() . '</h2>';
                }
                echo '</div><div class="card-body text-center">
                                    <h3 class="card-header-title pt-4">Id Usuario: ' . $account->getIdUsuario() .  '</h3>
                                    <p class="card-text">Email: ' . $account->getUsMail() . '</p>
                                </div>
                                <hr><form method="POST" action="AdminModify.php">
                                    <input id="accAction" name="accAction" value="modify" type="hidden">
                                    <input name="idusuario" value="' . $account->getIdUsuario() . '" type="hidden">';
                if ($account->getUsDeshabilitado() != null) {
                    echo "<p>Ultima vez deshabilitado: " . $account->getUsDeshabilitado() . "</p>
                    </form>";
                } else {
                    echo '<input type="submit" class="btn btn-outline-danger" value="Modificar informacion">
                                    </form>';
                }
                echo '<form method="POST" action="Action.php">
                        <input id="accAction" name="accAction" value="delete" type="hidden">
                        <input name="idusuario" value="' . $account->getIdUsuario() . '" type="hidden">
                        <input type="submit" class="btn btn-outline-danger mt-1" value="Eliminar">
                    </form>
                </div></div>';
            };
            ?>
            <div class="item-button"><a href="../Private/CreateAccount.php" type="button">
                    <h1>Crear Cuenta</h1>
                </a></div>
        </div>
    </div>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>