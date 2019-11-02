<?php
	session_start();
//var_dump($_GET['inputEmail']);
//var_dump($_GET['inputPassword']);
//die();
	$usuarioIngresado = $_GET['inputEmail'];
	$claveIngresada = $_GET['inputPassword'];
	
	$booUsuario = 0;
	$booPassword = 0;

	if (empty($usuarioIngresado) || empty($claveIngresada)) 
	{
		header("Location: ../paginas/login.php?error=camposvacios");
		exit();
	}
	else
	{
		$archivo = fopen("../usuario/usuario.txt", "r") or die("Imposible arbrir el archivo");
	
		while(!feof($archivo)) 
		{
			$objeto = json_decode(fgets($archivo));
			//var_dump($objeto->nombre);	
			//var_dump($objeto->contraseña);
			//die();
			if ($objeto->nombre == $usuarioIngresado) 
			{	
				$booUsuario = 1;
				if ($objeto->contraseña == $claveIngresada)
				{
					fclose($archivo);
					$_SESSION['usuario']=$objeto->$Usuario;
					$_SESSION['perfil']=$objeto->$Perfil;

					header("Location: ../paginas/ok.php?exito=signup");
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) {
			header("Location: ../paginas/no.php?error=usuarioincorrecto");
			fclose($archivo);
			exit();
		}
		else 
	    {
			header("Location: ../paginas/no.php?error=contraseñaincorrecta");
			fclose($archivo);
			exit();
		}

		fclose($archivo);
	}	
	header("Location: ../paginas/no.php");
	exit();
?>