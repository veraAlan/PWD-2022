<?
/* Agregar header a la pagina. */
include_once("../Estructura/header.php");
include_once("../../Control/TP1/EJ1.php");

$control = new controlNumero;
$valor = $control->vernumero($_GET['valor']);
/* Solucion del ejercicio. */
echo '<h1>Tu valor es ';
switch ($valor) {
    case "cero":
        echo "<strong>cero</strong></h1>";
        break;
    case $valor > 0:
        echo "<strong>positivo</strong></h1>";
        break;
    case $valor < 0:
        echo "<strong>negativo</strong></h1>";
        break;
}
?>

<form action="./EJ1.php">
    <button class="btn btn-primary" type="submit" name="submit">Volver</button>
</form>