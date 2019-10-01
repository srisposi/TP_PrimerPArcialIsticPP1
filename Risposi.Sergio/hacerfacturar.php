<?php

$precio = 100;	
$Bandera = 1;
	
date_default_timezone_set('America/Argentina/Buenos_Aires');
$horaSalida = mktime(); 

$checkPatente = $_GET['Patente'];




$archivo = fopen("listadopatente.txt", "r");
while(!feof($archivo)) 
	{
		$objeto = json_decode(fgets($archivo));

		if ($objeto->Patente == $checkPatente) 
		{
							 	
			{
				$Bandera=0;
				
			
			}

		}
			
		
	}	

if($Bandera==0)
	{	
		$diff=($horaSalida-$objeto->$Date);
		$pago=$precio*$diff;
		
		header("Location: Exito.php?pago=". $pago);


		exit();
	}
	else 
	{

		header("Location: Error.php");
		exit();
				 	
	}
fclose($archivo);
?>