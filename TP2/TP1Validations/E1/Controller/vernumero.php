<?php
if($_GET){
    $num = $_GET["value"];

    echo '<h1>Tu valor es ';
    switch($num) {
        case 0: echo "<strong>cero</strong>"; break;
        case $num > 0: echo "<strong>positivo</strong>"; break;
        case $num < 0: echo "<strong>negativo</strong>"; break;
    }
    
    echo '<br/><br/>
    <div class="row g-3 align-items-center">
        <form action="../View/index.php">
            <div class="col-auto">
                <label class="col-form-label">Ingrese un numero: </label>
            </div>
            <div class="col-auto">
                <input type="number" name="value" id="value" value="0"><br />
            </div>
            <div class="col-auto">
                <input type="submit" class="btn btn-primary" value="Enviar">
            </div>
        </form>
    </div>';
} else {
    echo '<h1 style="color: red">No se ingreso ningun valor.</h1>';
}