<?php
//	session_start();
//var_dump($_GET['inputEmail']);
//var_dump($_GET['inputPassword']);
//die();
include "AccesoDatos.php";
	$precio = 100;	
	//$bandera = 0;
	
	//date_default_timezone_set('America/Argentina/Buenos_Aires');
	//$horaSalida = mktime(); 
	
	$checkPatente = $_GET['inputPatente'];
	
	if (empty($checkPatente)) 
	{
		header("Location: ../paginas/facturarVehiculo.php?error=campovacio");
		exit();		
	}
	else
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		
		$consulta =$objetoAccesoDato->RetornarConsulta("select id, patente, fechaIngreso from factura");
	
		$consulta->execute();			
		
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);



		/*$archivo = fopen("../usuario/vehiculo.txt", "r") or die("Imposible arbrir el archivo");
		$historico = fopen("../usuario/historicoFacturados.txt", "a");	
		*/

		$objetoHistorico = new stdClass();
		


		//while(!feof($archivo)) 
		foreach ($datos as $factura) 
		{
			//$objeto = json_decode(fgets($archivo));
			//$objetoPatente = $objeto->nombre;
			//$horaEntrada = $objeto->fechaIngreso;
			
			//var_dump($objeto->nombre);
			//var_dump($objeto->fechaIngreso);
			//die();
	
			//var_dump($objeto->nombre);	
			//var_dump($objeto->contraseña);
			//die();
			
			//if ($objeto->nombre == $checkPatente) 
			if ($factura["patente"] == $checkPatente)  
			{	
				//$bandera = 1;

				date_default_timezone_set('America/Argentina/Buenos_Aires');

        		$horaSalida=mktime();


        		$date = new DateTime("$horaSalida");
				$result = $date->format('Y-m-d');
        		
        		$tiempo = $result - $factura['fechaIngreso']);

				var_dump($tiempo);
				die();

        		$resultado = $tiempo * $precio;	

        	}


				$objetoHistorico->patente = $factura['patente'];
				$objetoHistorico->fechaIngreso = $horaEntrada;
				$objetoHistorico->FechaSalida = $horaSalida;
				$objetoHistorico->totalCobrado = $resultado;
				
				//fwrite($historico, json_encode($objetoHistorico)."\n");
			

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            	
            	$select="INSERT INTO factura( patente, horaingreso, horasalida, importe) VALUES ('$objetoHistorico->patente','$objetoHistorico->horaEntrada','$objetoHistorico->horaSalida','$objetoHistorico->totalCobrado')";
            	
            	$consulta =$objetoAccesoDato->RetornarConsulta($select);
            	
            	$consulta->execute();
            
            	
            	$id=$factura['id'];
            	
            	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            	
            	$select="DELETE FROM `factura` WHERE id=$id";
            	
            	$consulta =$objetoAccesoDato->RetornarConsulta($select);
            	
            	$consulta->execute();	












				header("Location: ../paginas/facturarVehiculo.php?cobrar=".$resultado."&ingreso=".$horaEntrada."&salida=".$horaSalida);
				
				//	fclose($archivo);
				exit();
			
      
		}
	}
?>	

