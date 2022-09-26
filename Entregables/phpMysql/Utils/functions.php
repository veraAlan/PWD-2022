<?php

function data_submitted()
{
    $AUX = [];
    if (!empty($_POST)) {
        $AUX = $_POST;
    } elseif (!empty($_GET)) {
        $AUX = $_GET;
    }
    return $AUX;
}

spl_autoload_register(function ($class) {
    $directories = [
        $_SESSION['ROOT'] . 'Models/',
        $_SESSION['ROOT'] . 'Models/Connector/',
        $_SESSION['ROOT'] . 'Controllers/'
    ];

    foreach ($directories as $dir) {
        if (file_exists($dir . $class . '.php')) {
            require_once($dir . $class . '.php');
            return;
        }
    }
});
