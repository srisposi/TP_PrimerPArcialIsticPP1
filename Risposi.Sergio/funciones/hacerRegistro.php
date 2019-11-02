<?php

$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['nombre'];
$miObjeto->contraseña = $_GET['contraseña'];

$archivo = fopen('usuarios.txt', 'a');
	fwrite($archivo, json_encode($miObjeto)."\n");
	fclose($archivo);

header("Location: ../../paginas/ok.php");

?>