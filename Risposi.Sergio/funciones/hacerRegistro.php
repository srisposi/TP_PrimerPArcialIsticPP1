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
$miObjeto->perfil= $_GET['perfilRegistro'];

//Hago una consulta a mi base de datos para ver si el usuario ingresado ya esta 
//registrado

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta =$objetoAccesoDato->RetornarConsulta("select nombre  , clave  from usuario");
$consulta->execute();			
$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos as $usuario) 
{
	if ($usuario["nombre"] == $miObjeto->nombre)
	{


		header("Location: ../paginas/registro.php?exito=repetido");

	}
	else
	{

		$select="INSERT INTO usuario( nombre, clave) VALUES ('$miObjeto->nombre','$miObjeto->apellido','$miObjeto->perfil')";
		$consulta =$objetoAccesoDato->RetornarConsulta($select);
		$consulta->execute();

		header("Location: ../paginas/registro.php?exito=repetido");

	}	

}







/*INSERT INTO usuario( nombre, clave) VALUES ("natalia","natalia")

$archivo = fopen('usuarios.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");
fclose($archivo);*
*/

?>