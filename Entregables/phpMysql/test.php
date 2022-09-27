<?php
include_once("Models/Connector/Database.php");
include_once("Models/Persona.php");
include_once("Models/Auto.php");

include_once("Controllers/CPersona.php");
include_once("Controllers/CAuto.php");

$persona = new Persona();
$auto = new Auto();

$cpersona = new CPersona();
$cauto = new CAuto();

$persona->setNroDni(28326986);
if ($persona->Load()) {
    echo "Se pudo<br>";
} else {
    echo "No se pudo<br>";
};

echo $persona;

/* 
$auto->setPatente('LKI 865');
echo $auto; */
