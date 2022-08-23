<?php
if($_GET){
    $num = $_GET["value"];

    echo '<h1>Tu valor es ';
    switch($num) {
        case 0: echo "<strong>cero</strong>"; break;
        case $num > 0: echo "<strong>positivo</strong>"; break;
        case $num < 0: echo "<strong>negativo</strong>"; break;
    }
    
    // Back button
    echo '<br/><br/>
    <!-- Bootstrap Ref -->
    <link href="../../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
    <form action="../View/index.php">
        <button class="btn btn-primary" type="submit" name="submit">Volver</button>
    </form>';
} else {
    echo '<h1 style="color: red">No se ingreso ningun valor.</h1>';
}