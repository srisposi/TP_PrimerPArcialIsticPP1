<?php
//	session_start();
//var_dump($_GET['inputEmail']);
//var_dump($_GET['inputPassword']);
//die();
	$precioFraccion = 100;	
	$contadorFraccion = 0;
	$borrar = false;
	
	date_default_timezone_set('America/Argentina/Buenos_Aires');
	$horaSalida = mktime(); 
	
	$checkPatente = $_GET['inputPatente'];
	
	if (empty($checkPatente)) 
	{
		header("Location: ../paginas/facturarVehiculo.php?error=campovacio");
		exit();		
	}
	else
	{
		$archivo = fopen("../usuario/vehiculo.txt", "r") or die("Imposible arbrir el archivo");
		$historico = fopen("../usuario/historicoFacturados.txt", "a");	
		$objetoHistorico = new stdClass();



		while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));
			$objetoPatente = $objeto->nombre;
			$horaEntrada = $objeto->fechaIngreso;
			//var_dump($objeto->nombre);
			//var_dump($objeto->fechaIngreso);
			//die();
	
			//var_dump($objeto->nombre);	
			//var_dump($objeto->contraseña);
			//die();
			if ($objeto->nombre == $checkPatente) 
			{	
				$borrar = true;

				$diffSegundos = $horaSalida - $horaEntrada;
				$diffAlternativo = $diffSegundos;

				while ($diffAlternativo >= 3600) 
				{			
					if ($diffAlternativo >= 3600) 
					{
						$contadorFraccion++;
						$diffAlternativo = $diffAlternativo - 3600;
						
					}
					else if ($diffAlternativo >= 1800)
					{
						$contadorFraccion++;
					}					
				}
				$resultado = $contadorFraccion * $precioFraccion;

				$objetoHistorico->patente = $objetoPatente;
				$objetoHistorico->horaIngreso = $horaEntrada;
				$objetoHistorico->horaSalida = $horaSalida;
				$objetoHistorico->totalCobrado = $resultado;
				fwrite($historico, json_encode($objetoHistorico)."\n");
				header("Location: ../paginas/facturarVehiculo.php?cobrar=".$resultado."&ingreso=".$horaEntrada."&salida=".$horaSalida."&estadia=".$contadorFraccion);
					fclose($archivo);
				exit();
			}
			else
			{
				header("Location: ../paginas/facturarVehiculo.php?error=patentenoexiste");
			}
      	}
      	fclose($archivo);
      	fclose($historico);
     	if ($borrar) 
     	{
     		$archOriginal = fopen('../archivos/estacionados.txt', 'a');
			$archTemporal = fopen('../archivos/estacionados.tmp', 'a');
			$probandoPatente = "fff444";
			$reemplazarOriginal = false;
			while (!feof($archOriginal)) 
			{
			  	$registroJson = fgets($archOriginal);
				if (stristr($registroJson->patente,$probandoPatente)) 
				{
				    $registroJson = "";	
				    $reemplazarOriginal = true;
				}
				fputs($archTemporal, $registroJson);
			}
			fclose($archOriginal); 
			close($archTemporal);
			if ($reemplazarOriginal) 
			{
				// var_dump($diffSegundos)
			 //  			die();
			    rename('../archivos/estacionados.tmp', 'estacionados.txt');
			} else unlink('estacionados.tmp');
		}
	}
?>	

