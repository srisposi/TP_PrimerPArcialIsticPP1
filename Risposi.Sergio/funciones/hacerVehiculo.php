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
$miObjeto->nombre = $_GET['inputPatente'];

//$miObjeto->apellido = $_GET['inputPassword'];

$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 

//Hago consulta primero para no repetir vehiculos
$consulta =$objetoAccesoDato->RetornarConsulta("select patente  , clave  from factura");

$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos as $factura)
{
	if($factura["patente"]==$miObjeto->nombre)
	{
		$select="INSERT INTO factura(patente) VALUES ('$miObjeto->nombre')";
		$consulta =$objetoAccesoDato->RetornarConsulta($select);
		$consulta->execute();

		header("Location: ../paginas/ingresarVehiculo.php?exito=exito");
	}

	else
	{
		header("Location: ../paginas/ingresarVehiculo.php?exito=repetido");

	}	

}




?>