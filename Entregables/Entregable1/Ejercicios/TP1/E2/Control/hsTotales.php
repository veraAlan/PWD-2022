<?php
echo '
<!-- Bootstrap Ref -->
<link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">';
$array = $_GET;
$values = [];
foreach ($array as $day) {
    if ($day != null && $day != "Enviar") {
        array_push($values, $day);
    }
}

if (count($values) > 0) {
    $hs_mins = [0, 0];

    foreach ($values as $value) {
        $time = explode(":", $value);
        $hs_mins = [$hs_mins[0] + $time[0], $hs_mins[1] + $time[1]];
    }

    $mins = $hs_mins[1] % 60;
    $hs = $hs_mins[0] + (($hs_mins[1] - $mins) / 60);
    echo "<h3><strong> Las horas totales de cursada por semana son: " . $hs . ":" . $mins . " hs</strong></h3>";
} else {
    echo "<h3><strong>No se ingreso ningun valor.</strong></h3>";
}

// Back button
echo '<br/><br/>
            <form action="../Vista/index.php">
                <button class="btn btn-primary" type="submit" name="submit">Volver</button>
            </form>';
