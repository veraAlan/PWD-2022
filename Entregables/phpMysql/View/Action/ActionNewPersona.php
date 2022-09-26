<?php
include "../../config.php";
$data = data_submitted();
$arrayPersona = new CPersona();
include_once("../Structure/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>>####</</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="container col-md-10">
            <h2>Resultado la busqueda:</h2>
            <div class="mb-3">
                <?php
                if ($arrayPersona->Search($data) == null) {
                    if ($arrayPersona->Add($data)) {
                        echo "<p>La persona a sido agregada</p>";
                    } else {
                        echo "<p>La persona no se puede agregar en BD</p>";
                    }
                } else {
                    echo "<p>La persona ya existe en la BD</p>";
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