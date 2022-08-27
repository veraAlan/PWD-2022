<?php
echo '<!-- Bootstrap Ref -->
<link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="container p-5">';
if ($_GET) {
    $num = $_GET["value"];

    echo '<h1>Tu valor es ';
    switch ($num) {
        case 0:
            echo "<strong>cero</strong></h1>";
            break;
        case $num > 0:
            echo "<strong>positivo</strong></h1>";
            break;
        case $num < 0:
            echo "<strong>negativo</strong></h1>";
            break;
    }
} else {
    echo '<h1 style="color: red">No se ingreso ningun valor.</h1>';
}

// Back button
echo '
    <br/><br/>
    <form action="../Vista/index.php">
        <button class="btn btn-primary" type="submit" name="submit">Volver</button>
    </form>
    </div>';
