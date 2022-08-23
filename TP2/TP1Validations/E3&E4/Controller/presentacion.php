<?php
echo "Hola, yo soy " . $_POST['nombre'] . " " . $_POST['apellido'] . " tengo " . $_POST['edad'] . " años y vivo en " . $_POST['direccion'] . "<br/>";
if ($_POST['edad'] >= 18) {
    echo "Y soy mayor de edad.";
} else {
    echo "Y soy menor de edad.";
}
