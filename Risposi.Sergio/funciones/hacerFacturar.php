<?php
include "AccesoDatos.php";
$precio = 100;	
$bandera=1;
$checkPatente = $_GET['inputPatente'];
date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaSalida=mktime();
if (empty($checkPatente)) 
{
	header("Location: ../paginas/facturarVehiculo.php?error=campovacio");
	exit();		
}
else
{
	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 		
	$consulta =$objetoAccesoDato->RetornarConsulta("SELECT * from factura");	
	$consulta->execute();					
	$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);

	$objetoHistorico = new stdClass();
	

	foreach ($datos as $factura) 
	{			
		if ($factura['patente'] == $checkPatente)  
		{	
		
			$bandera=0;
			
			
			        		
			$tiempo = $horaSalida - $factura['fechaIngreso'];
			$resultado = $tiempo * $precio;	
			$objetoHistorico->patente=$checkPatente;
			$objetoHistorico->fechaIngreso=$factura['fechaIngreso'];
			$objetoHistorico->fechaEgreso=$horaSalida;
			$objetoHistorico->totalCobrado=$resultado;

		}
	}



	if($bandera==0)
	{
	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();	    	
		$select="INSERT INTO historicoFacturados(patente, fechaIngreso, fechaEgreso, montoFactura) VALUES ('$objetoHistorico->patente','$objetoHistorico->fechaIngreso','$objetoHistorico->fechaEgreso','$objetoHistorico->totalCobrado')";	
		  	
		$consulta =$objetoAccesoDato->RetornarConsulta($select);	    	
		$consulta->execute();
		             	
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 	    	
		$select2="DELETE FROM factura WHERE patente=$checkPatente";	    	
		$consulta2 =$objetoAccesoDato->RetornarConsulta($select2);	    	
		$consulta2->execute();

		header("Location: ../paginas/facturarVehiculo.php?cobrar=".$resultado."&ingreso=".$objetoHistorico->fechaIngreso."&salida=".$objetoHistorico->fechaEgreso);			
		exit();      
	}
	else
	{
		header("Location: ../paginas/facturarVehiculo.php?error=error");
		exit();	
	}

}


?>	

