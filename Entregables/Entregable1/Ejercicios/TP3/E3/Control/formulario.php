<?php

$peliculaC = $_POST;
//comprobamos la imagen y la extension
//array de archivos disponibles
$archivos_disp_ar = array('jpg', 'jpeg', 'gif', 'png', 'tif', 'tiff', 'bmp');
//carpteta donde vamos a guardar la imagen
$carpeta = "./img/" . basename($_FILES['imagen']['name']);
//recibimos el campo de imagen
$tmp_dir = $_FILES['imagen']['tmp_name'];
//guardamos el nombre original de la imagen en una variable
$nombre = $_FILES['imagen']['name'];

$extension = pathinfo($nombre, PATHINFO_EXTENSION);


if (!move_uploaded_file($tmp_dir , $carpeta)) {
echo "Error imagen de archivo no encontrado.";
}


echo'<!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <div class="container p-5">
        <div class="modal-dialog">
            <div class="modal-content rounded-3" style="background-color: rgba(180, 243, 148, 0.3)">
                <div class="modal-body p-5">
                <form action="../Vista/index.php">
                    <button type="submit" class="btn-close m-1 position-absolute end-0 top-0 p-4" style="background-size: 12px" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h2 class="modal-title text-primary mx-auto mt-3 mb-5 " id="exampleModalLabel">La pelicula introducida es</h2>
                <div class="row"> 
                <div class="col-6">';
    foreach($peliculaC as $titulo => $dato){
    $titulo = str_replace("_", " ",$titulo);
        if($titulo != "imagen"){
        echo "<strong>$titulo</strong>" . ": " . $dato . "<br>";
    }
}
    
    echo '</div> <div class="col-6"><img class="w-100" src="' . $carpeta . '"></div>';

    echo '</div></form></div></div></div></div>';
