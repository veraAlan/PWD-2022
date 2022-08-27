<?php
$peliculaC = $_POST;

echo '<!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../../Utilidades/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <div class="container p-5">
    <div class="modal-dialog">
    <div class="modal-content rounded-3" style="background-color: rgba(180, 243, 148, 0.3)">
        <div class="modal-body p-5">
            <form action="../Vista/index.php">
            <button type="submit" class="btn-close m-1 position-absolute end-0 top-0 p-4" style="background-size: 12px" data-bs-dismiss="modal" aria-label="Close"></button>
            <h2 class="modal-title text-primary mx-auto mt-3 mb-5 " id="exampleModalLabel">La pelicula introducida es</h2>';
     
 
    foreach($peliculaC as $titulo => $dato){
    $titulo = str_replace("_", " ",$titulo);

        echo "<strong>$titulo</strong>" . ": " . $dato . "<br>";
    }


    echo '</form></div></div></div></div>';
