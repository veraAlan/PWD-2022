<?php
switch ($_GET['student']) {
    case "yes":
        if ($_GET['age'] >= 12) {
            echo "El precio es $180.<br/>";
        } else {
            echo "El precio es $160.<br/>";
        }
        break;
    case "no":
        if ($_GET['age'] < 12) {
            echo "El precio es $160.<br/>";
        } else {
            echo "El precio es $300.<br/>";
        }
        break;
}

// Back button.
echo '<br/>
    <form action="../View/index.php">
        <input type="submit" value="Volver a consultar" />
    </form>
    ';
