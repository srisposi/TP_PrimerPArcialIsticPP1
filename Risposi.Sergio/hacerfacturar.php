<?php

$precio = 100;	
$Bandera = 0;
	
date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaSalida = mktime(); 

$checkPatente = $_GET['Patente'];




$archivo = fopen("listadopatente.txt", "r");
while(!feof($archivo)) 
	{
		$objeto = json_decode(fgets($archivo));

		if ($objeto->Vehiculo == $checkPatente) 
		{
							 	
			{
				$Bandera=0;
				
			
			}

		}
			
		
	}	

if($Bandera==0)
	{	
		$diff=($objeto->Date - $horaSalida);
		$pago=$precio*$diff;
		$pasoPago = jason_encode($pago);
		header("Location: Exito.php");
		exit();
	}
	else 
	{

		header("Location: Error.php");
		exit();
				 	
	}
fclose($archivo);
?>