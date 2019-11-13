<?php
/*$miObjeto = new stdClass();

date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaIngreso = mktime();

$miObjeto->nombre = $_GET['inputPatente'];
$miObjeto->fechaIngreso = $horaIngreso;

$archivo = fopen('../usuario/vehiculo.txt', 'a');
fwrite($archivo, json_encode($miObjeto)."\n");

fclose($archivo);
header("Location: ../paginas/ingresarVehiculo.php?exito=exito");
*/

include 'AccesoDatos.php';
$miObjeto = new stdClass();
$miObjeto->patente = $_GET['inputPatente'];

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaIngreso = mktime();

//$miObjeto->apellido = $_GET['inputPassword'];

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

//Hago consulta primero para no repetir vehiculos
$consultaSQL="select patente from factura where patente='$miObjeto->patente' ";

//var_dump($consultaSQL);
//die();

$consulta =$objetoAccesoDato->RetornarConsulta($consultaSQL);
$consulta->execute();	
$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
//var_dump($datos[0]['patente']);
//die();


if(!isset($datos[0]['patente']))
	{
		$select="INSERT INTO factura(patente, fechaIngreso) VALUES ('$miObjeto->patente','$fechaIngreso')";
		
		$consulta =$objetoAccesoDato->RetornarConsulta($select);
		
		$consulta->execute();

		header("Location: ../paginas/ingresarVehiculo.php?exito=exito");

	}
	else
	{
		header("Location: ../paginas/ingresarVehiculo.php?exito=repetido");

	}	
/*
if($consultaSQL==[0])
{
	$select="INSERT INTO factura(patente) VALUES ('$miObjeto->patente')";
		$consulta =$objetoAccesoDato->RetornarConsulta($select);
		$consulta->execute();

		header("Location: ../paginas/ingresarVehiculo.php?exito=exito");
}
else
{
	header("Location: ../paginas/ingresarVehiculo.php?exito=exito");


}




/*
foreach ($datos as $factura)
{
	if($factura["patente"]!=$miObjeto->patente)
	{
		$select="INSERT INTO factura(patente) VALUES ('$miObjeto->patente')";
		$consulta =$objetoAccesoDato->RetornarConsulta($select);
		$consulta->execute();

		header("Location: ../paginas/ingresarVehiculo.php?exito=exito");
	}

	else
	{
		header("Location: ../paginas/ingresarVehiculo.php?exito=repetido");

	}	

}

*/


?>
