<?php
if($_GET){
    $num = $_GET["value"];

    echo '<h1>Tu valor es ';
    switch($num) {
        case 0: echo "<strong>cero</strong>"; break;
        case $num > 0: echo "<strong>positivo</strong>"; break;
        case $num < 0: echo "<strong>negativo</strong>"; break;
    }
    
    echo '<br/><br/>
            <form action="../View/index.php">
                <input type="submit" value="Volver" />
            </form>';
} else {
    echo '<h1 style="color: red">No se ingreso ningun valor.</h1>';
}