<?php
echo '
<!-- Bootstrap Ref -->
<link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="container p-5"><p>';

switch($_GET['operand']){
    case 'sum': $res = $_GET['stValue'] + $_GET['ndValue'];
        echo "Sumando";
        break;
    case 'sub': $res = $_GET['stValue'] - $_GET['ndValue'];
    echo "Restando";
        break;
    case 'mult': $res = $_GET['stValue'] * $_GET['ndValue'];
    echo "Multiplicando";
        break;
    case 'div': 
        if($_GET['ndValue'] == 0){
            $res = "Indefinido.";
        } else {
            $res = $_GET['stValue'] / $_GET['ndValue'];
        }
        echo "Dividiendo";
        break;
}
echo " los valores " . $_GET['stValue'] . " y " . $_GET['ndValue'] . " da como resultado: " . $res;

// Back button
echo '</p><br/><br/>
        <form action="../Vista/index.php">
            <button class="btn btn-primary" type="submit" name="submit">Volver</button>
        </form>';