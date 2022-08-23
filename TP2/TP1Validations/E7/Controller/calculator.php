<?php
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
echo '<br/><br/>
        <!-- Bootstrap Ref -->
        <link href="../../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <form action="../View/index.php">
            <button class="btn btn-primary" type="submit" name="submit">Volver</button>
        </form>';