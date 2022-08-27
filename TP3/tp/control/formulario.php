<?php

$peliculaC = $_POST;
//comprobamos la imagen y la extension
  //array de archivos disponibles
  $archivos_disp_ar = array('jpg', 'jpeg', 'gif', 'png', 'tif', 'tiff', 'bmp');
  //carpteta donde vamos a guardar la imagen
  $carpeta = 'img/';
  //recibimos el campo de imagen
  $img = $_FILES['imagen']['tmp_name'];
  //guardamos el nombre original de la imagen en una variable
  $nombre = $_FILES['imagen']['name'];

echo $_FILES['imagen']['tmp_name'];

echo'<!-- Bootstrap Ref -->
    <link href="../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <div class="container p-5">
    <div class="modal-dialog">
    <div class="modal-content rounded-3" style="background-color: rgba(180, 243, 148, 0.3)">
        <div class="modal-body p-5">
            <form action="../View/index.php">
            <button type="submit" class="btn-close m-1 position-absolute end-0 top-0 p-4" style="background-size: 12px" data-bs-dismiss="modal" aria-label="Close"></button>
            <h2 class="modal-title text-primary mx-auto mt-3 mb-5 " id="exampleModalLabel">La pelicula introducida es</h2>';
     
 
    foreach($peliculaC as $titulo => $dato){
    $titulo = str_replace("_", " ",$titulo);
        if($titulo != "imagen"){
        echo "<strong>$titulo</strong>" . ": " . $dato . "<br>";
    }
}

    echo $nombre;

    echo '</form></div></div></div></div>';

?>