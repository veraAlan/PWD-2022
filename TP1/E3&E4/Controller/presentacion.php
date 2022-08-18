<?php
echo "Hola, yo soy ". $_GET['nombre'] . " " . $_GET['apellido'] . " tengo " . $_GET['edad'] . " años y vivo en " . $_GET['direccion'] . "<br/>";
if($_GET['edad'] >= 18){
    echo "Y soy mayor de edad.";
} else {
    echo "Y soy menor de edad.";
}