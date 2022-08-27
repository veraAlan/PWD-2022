<?php
echo "
<!-- Bootstrap Ref -->
<link href='../../../../Utilidades/Bootstrap/css/bootstrap.min.css' rel='stylesheet'>
    <div class='container p-4'><h4>Hola, yo soy " . $_POST['nombre'] . " " . $_POST['apellido'] .
    ".<br/>Sexo " . $_POST['sexo'] . ", tengo " . $_POST['edad'] . " años y vivo en " . $_POST['direccion'] . ".<br/>" .
    "Estudios completados: " . $_POST['estudios'] . ".<br/>";

if (key_exists('deportes', $_POST)) {
    echo "Hago " . count($_POST['deportes']) . " deportes.<br/>";
} else {
    echo "No hago ningun deportes.<br/>";
}
if ($_POST['edad'] >= 18) {
    echo "Y soy mayor de edad.</h4>";
} else {
    echo "Y soy menor de edad.</h4>";
}

// Back button
echo '<br/><br/>
            <form action="../Vista/index.php">
                <button class="btn btn-primary" type="submit" name="submit">Volver</button>
            </form>';