<?php
$miObjeto = new stdClass();

date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaIngreso = mktime();

$miObjeto->nombre = $_GET['inputPatente'];
$miObjeto->fechaIngreso = $horaIngreso;

$archivo = fopen('../usuario/vehiculo.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");

fclose($archivo);
header("Location: ../paginas/ingresarVehiculo.php?exito=exito");



?>