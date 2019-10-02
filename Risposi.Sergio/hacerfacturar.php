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
//echo "<br>";
var_dump($objeto);
//echo "<br>";
var_dump($checkPatente);
		if ($objeto->Patente == $checkPatente) 
		{
							 	
			{
				$Bandera=0;
				//echo "<br>es:";
				//var_dump($objeto);
				$diff=($horaSalida-$objeto->fechaIngreso);
				$pago=$precio*$diff;
				//var_dump($horaSalida);
				//var_dump($objeto->fechaIngreso);				
				//die();
				//header("Location: Exito.php?fechaIngreso=".$objeto->fechaIngreso);
				header("Location: Exito.php?pago=".$pago);
				exit();
			
			}

		}


	}

if($Bandera==1)
{
	//die();
	header("Location: Error.php");
	exit();		
	
}



fclose($archivo);
?>