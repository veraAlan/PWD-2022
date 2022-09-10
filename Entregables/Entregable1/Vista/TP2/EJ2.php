<?php


/* TODO un switch al estilo menu para redirigir as cada EJ con su propia validacion.
Para evitar crear un php para llamar cada ejercicio */
switch($opcion){
case "EJ1":
    include "../TP1/EJ1.html";
    
    echo "<script>";
    
    include "../js/validaciones/EJ1.js";
    
    echo "</script>";
    break;
case "EJ2":
    include "../TP1/EJ2.html";
    
    echo "<script>";
    
    include "../js/validaciones/EJ2.js";
    
    echo "</script>";
    break;
}
