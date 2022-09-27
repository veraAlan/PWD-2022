<?php
include "../../config.php";
$data = data_submitted();
$arrayAuto = new CAuto();
include_once("../Structure/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>####</</title>
    <link rel="stylesheet" href="../Assets/css/bootstrapv5.2.1.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="container col-md-10">
            <h2>Resultado la busqueda:</h2>
            <div class="mb-3">
                <?php
                if ($arrayAuto->Search($data)) {
                    echo "<p>El auto sea eliminado de la BD</p>";
                } else {
                    echo "<p>El auto no sea podido eliminado de la BD</p>";
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>
<?php
include_once("../Structure/footer.php")
?>