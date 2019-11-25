<?php
session_start();
include 'AccesoDatos.php';

$bandera=1;

$miObjeto = new stdClass();
$miObjeto->nombre = $_GET['inputUsuario'];
$miObjeto->apellido = $_GET['inputPassword'];
$miObjeto->perfil= $_SESSION['perfilRegistro'];

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
$consulta =$objetoAccesoDato->RetornarConsulta("select nombre from usuario");
$consulta->execute();			
$datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
//Consulta para ver si el usuario ya esta registrado
foreach ($datos as $usuario) 
{
	
	if ($usuario["nombre"] == $miObjeto->nombre)
	{
		$bandera=0;
		break;
	}		
}
//Si esta registrado vuelvo por header un repetido que lo recibe registro y lo muestra y si no esta lo cargo en dos tablas.
if($bandera==0)
{
	header("Location: ../paginas/registro.php?exito=repetido");
}
else
{
//Cargo el nuevo registro en la tabla usuario	
	$select="INSERT INTO usuario( nombre, clave) VALUES ('$miObjeto->nombre','$miObjeto->apellido')";
		$consulta=$objetoAccesoDato->RetornarConsulta($select);
		$consulta->execute();
//Cargo el nuevo registro en la tabla historicoUsuario
	$insert="INSERT INTO historicoUsuario( nombre, perfil) VALUES ('$miObjeto->nombre','$miObjeto->perfil')";
	$consulta=$objetoAccesoDato->RetornarConsulta($insert);
		$consulta->execute();	
//finalmente devuelvo por header exito para que lo muestre en la pagina Registro
		header("Location: ../paginas/registro.php?exito=exito");
}

?>