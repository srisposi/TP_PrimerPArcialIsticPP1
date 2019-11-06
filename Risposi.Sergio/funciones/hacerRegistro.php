<?php

/*$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['inputUsuario'];
$miObjeto->contraseña = $_GET['inputPassword'];

$archivo = fopen('../usuario/usuario.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");

fclose($archivo);
header("Location: ../paginas/registro.php?exito=exito");
*/



include 'AccesoDatos.php';
$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['inputUsuario'];
$miObjeto->apellido = $_GET['inputPassword'];
$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$select="INSERT INTO usuario( nombre, clave) VALUES ('$miObjeto->nombre','$miObjeto->apellido')";
$consulta =$objetoAccesoDato->RetornarConsulta($select);
$consulta->execute();

header("Location: ../paginas/registro.php?exito=exito");

/*INSERT INTO usuario( nombre, clave) VALUES ("natalia","natalia")

$archivo = fopen('usuarios.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");
fclose($archivo);*
*/

?>