<?php
$MiObjeto=new stdClass();
$MiObjeto->Nombre=$_GET['Vehiculo'];
$MiObjeto->Apellido=$_GET['Date'];

$archivo = fopen("listadopatente.txt", "a");
fwrite($archivo,json_encode($MiObjeto)."\n");
fclose($archivo);
?>