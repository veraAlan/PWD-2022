<?php
switch ($_GET['student']) {
    case "yes":
        if ($_GET['age'] >= 12) {
            echo "<h3>El precio es $180.</h3>";
        } else {
            echo "<h3>El precio es $160.</h3>";
        }
        break;
    case "no":
        if ($_GET['age'] < 12) {
            echo "<h3>El precio es $160.</h3>";
        } else {
            echo "<h3>El precio es $300.</h3>";
        }
        break;
}

// Back button
echo '<br/><br/>
        <!-- Bootstrap Ref -->
        <link href="../../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <form action="../View/index.php">
            <button class="btn btn-primary" type="submit" name="submit">Volver</button>
        </form>';