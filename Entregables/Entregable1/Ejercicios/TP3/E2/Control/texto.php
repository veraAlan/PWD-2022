<?php

$folder = "./archivos/" . basename($_FILES['archivo']['name']);
$tmp_dir = $_FILES['archivo']['tmp_name'];
$name = $_FILES['archivo']['name'];
$ext = pathinfo($name, PATHINFO_EXTENSION);

echo '
    <!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <div class="container p-5"><h1> El Texto del documento ingresado es: </h1>
    ';

if (move_uploaded_file($tmp_dir , $folder)) {
    $lines = file($folder);
    echo "<textarea id='text' rows='10' cols='90'>";
    foreach($lines as $line) {
        echo $line;
    }
    echo "</textarea>";
}

// Back button
echo '<br/>
        <form action="../Vista/index.php">
            <button class="btn btn-primary mt-2" type="submit" name="submit">Volver</button>
        </form>
        </div>';