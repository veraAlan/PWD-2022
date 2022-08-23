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
    case 'div': $res = $_GET['stValue'] / $_GET['ndValue'];
    echo "Dividiendo";
        break;
}
echo " los valores " . $_GET['stValue'] . " y " . $_GET['ndValue'] . " es: " . $res;
echo '<br/>
    <form action="../View/index.php">
        <input type="submit" value="Volver" />
    </form>
    ';