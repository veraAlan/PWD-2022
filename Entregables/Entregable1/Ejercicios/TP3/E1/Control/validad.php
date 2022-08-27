<?php
$archivo = $_FILES['archivoInput']['name'];
$extension = pathinfo($archivo, PATHINFO_EXTENSION);
$archivoTamanio = $_FILES['archivoInput']['size'];
$carpeta = './carpeta/' . basename($_FILES['archivoInput']['name']);
$tmp_dir = $_FILES['archivoInput']['tmp_name'];

if ($extension == 'doc' || $extension == 'pdf' && $archivoTamanio < 2000000) {
    if (move_uploaded_file($tmp_dir, $carpeta)) {
        $lines = file($carpeta);
        if ($extension == 'pdf') {
            echo '<iframe  style="width: 100%; height: 100%;" src="' . $carpeta . '"/>';
        } else {
            echo '<iframe  style="width: 100%; height: 100%;" src="' . $carpeta . '"/>';
        }
    } else {
        echo "Error guardando archivo.";
    }
}
