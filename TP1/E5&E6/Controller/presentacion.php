<?php
echo "Hola, yo soy ". $_GET['nombre'] . " " . $_GET['apellido'] . 
".<br/>Sexo " . $_GET['sexo'] . ", tengo " . $_GET['edad'] . " años y vivo en " . $_GET['direccion'] . ".<br/>" . 
"Estudios completados: " . $_GET['studies'] . ".<br/>Hago " . count($_GET['deportes']) . " deportes.<br/>";
if($_GET['edad'] >= 18){
    echo "Y soy mayor de edad.";
} else {
    echo "Y soy menor de edad.";
}