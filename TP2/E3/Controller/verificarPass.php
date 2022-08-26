<?php

$cuentas = [
    ["username" => "Yozkos",
    "password" => "Maricon123"],
    ["username" => "Krainu",
    "password" => "Kulia123"],
    ["username" => "Nero",
    "password" => "A2345678"],
    ["username" => "admin",
    "password" => "admin123"]
];

$length = count($cuentas);
$i = 0;

while($i < $length){
    if($cuentas[$i]["username"] == $_POST["username"]){
        if($cuentas[$i]["password"] == $_POST["password"]) {

            
            echo '<script type="text/javascript">alert("Bienvenido ' . $_POST["username"] . '")</script>';

            echo "<h1 class='m-2'><strong>Pagina de login.</strong></h1>";
            $i = $length;
        } else {
            echo "<h1 class='m-2'><strong>Contrasenia incorrecta.</strong></h1>";
            $i = $length;
        }
    } else if ($i == $length-1){
        echo "<h1 class='m-2'><strong>Usuario no existe.</strong></h1>";
    }
    $i++;
}

// Back button
echo '<br/><br/>
        <!-- Bootstrap Ref -->
        <link href="../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <form action="../View/index.php">
            <button class="btn btn-primary m-2" type="submit" name="submit">Log out</button>
        </form>';