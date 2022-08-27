<?php
echo '
<!-- Bootstrap Ref -->
<link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">';

echo "<div class='container p-5'><h3>Hola, yo soy " . $_POST['nombre'] . " " . $_POST['apellido'] . " tengo " . $_POST['edad'] . " años y vivo en " . $_POST['direccion'];
if ($_POST['edad'] >= 18) {
    echo " y soy mayor de edad.</h3></div>";
} else {
    echo " y soy menor de edad.</h3></div>";
}

// Back button
echo '<br/><br/>
            <form action="../Vista/index.php">
                <button class="btn btn-primary" type="submit" name="submit">Volver</button>
            </form>';