<?php
echo "Hola, yo soy " . $_POST['name'] . " " . $_POST['surname'] .
    ".<br/>Sexo " . $_POST['sexo'] . ", tengo " . $_POST['age'] . " años y vivo en " . $_POST['dir'] . ".<br/>" .
    "Estudios completados: " . $_POST['studies'] . ".<br/>Hago " . count($_POST['deportes']) . " deportes.<br/>";
if ($_POST['age'] >= 18) {
    echo "Y soy mayor de edad.";
} else {
    echo "Y soy menor de edad.";
}
