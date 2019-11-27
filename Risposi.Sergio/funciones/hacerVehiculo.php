<?php
include 'AccesoDatos.php';
$miObjeto = new stdClass();
$miObjeto->patente = $_GET['inputPatente'];

date_default_timezone_set('America/Argentina/Buenos_Aires');
$fechaIngreso = mktime();

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
//Hago consulta primero para no repetir vehiculos
$consultaSQL="select patente from factura where patente='$miObjeto->patente' ";

$consulta =$objetoAccesoDato->RetornarConsulta($consultaSQL);
$consulta->execute();	
$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

if(!isset($datos['patente']))
	{
		$select="INSERT INTO factura(patente, fechaIngreso) VALUES ('AAA333','$fechaIngreso')";		
		$consulta =$objetoAccesoDato->RetornarConsulta($select);		
		$consulta->execute();
		
		$selectdos="INSERT INTO historicoVehiculos (patente, fechaIngreso) VALUES ('$miObjeto->patente','$fechaIngreso')";		
		$consulta =$objetoAccesoDato->RetornarConsulta($selectdos);		
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
