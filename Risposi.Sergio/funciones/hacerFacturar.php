<?php
include "AccesoDatos.php";
$precio = 100;	
$bandera=1;
$checkPatente = $_GET['inputPatente'];
if (empty($checkPatente)) 
{
	header("Location: ../paginas/facturarVehiculo.php?error=campovacio");
	exit();		
}
else
{
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 		
	$consulta =$objetoAccesoDato->RetornarConsulta("select * from factura");	
	$consulta->execute();					
	$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

	$objetoHistorico = new stdClass();
	
foreach ($datos as $factura) 
{			
	if ($factura["patente"] == $checkPatente)  
	{	
		$bandera=0;
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$horaSalida=mktime();
		        		
		$tiempo = $horaSalida - $factura['fechaIngreso'];
		$resultado = $tiempo * $precio;	
	}
}

if($bandera==0)
{
	$objetoHistorico->patente = $factura['patente'];
	$objetoHistorico->fechaIngreso = $factura['fechaIngreso'];
	$objetoHistorico->FechaSalida = $horaSalida;
	$objetoHistorico->totalCobrado = $resultado;
	
	
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();	    	
	$select="INSERT INTO historicoFacturados(patente, fechaIngreso, fechaEgreso, montoFactura) VALUES ('$objetoHistorico->patente','$objetoHistorico->fechaIngreso','$objetoHistorico->FechaSalida','$objetoHistorico->totalCobrado')";	    	
	$consulta =$objetoAccesoDato->RetornarConsulta($select);	    	
	$consulta->execute();
	             	
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 	    	
	$select="DELETE FROM `factura` WHERE patente=$checkPatente";	    	
	$consulta =$objetoAccesoDato->RetornarConsulta($select);	    	
	$consulta->execute();

	header("Location: ../paginas/facturarVehiculo.php?cobrar=".$resultado."&ingreso=".$objetoHistorico->fechaIngreso."&salida=".$objetoHistorico->FechaSalida);			
	exit();      
}
else
{
	header("Location: ../paginas/facturarVehiculo.php?error=error");
	exit();	
}
}

?>	

