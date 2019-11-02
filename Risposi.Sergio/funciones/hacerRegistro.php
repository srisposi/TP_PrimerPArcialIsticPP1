<?php

$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['inputUsuario'];
$miObjeto->contraseña = $_GET['inputPassword'];

$archivo = fopen('../usuario/usuario.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");

fclose($archivo);
header("Location: ../paginas/ok.php");



?>