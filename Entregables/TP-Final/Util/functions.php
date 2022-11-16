<?php
function data_submitted()
{
    $_AAux = array();
    if (!empty($_POST))
        $_AAux = $_POST;
    else
        if (!empty($_GET)) {
        $_AAux = $_GET;
    }
    if (count($_AAux)) {
        foreach ($_AAux as $indice => $valor) {
            if ($valor == "")
                $_AAux[$indice] = 'null';
        }
    }
    return $_AAux;
}

spl_autoload_register(function ($class) {
    echo "Cargamos la class  " . $class . "<br>";
    $directories = array(
        $GLOBALS['ROOT'] . 'Util/',
        $GLOBALS['ROOT'] . 'Model/',
        $GLOBALS['ROOT'] . 'Controller/',
        $GLOBALS['ROOT'] . 'Model/Conection/',
    );
    print_r($directories);
    foreach ($directories as $directory) {
        if (file_exists($directory . $class . '.php')) {
            echo "se incluyo" . $directory . $class . '.php';
            require_once($directory . $class . '.php');
            return;
        }
    }
});
