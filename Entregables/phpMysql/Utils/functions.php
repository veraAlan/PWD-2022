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
