<?php
	session_start();
	setcookie("usuario");
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
				
				$_COOKIE["usuario"]=$usuarioIngresado;

				var_dump($_COOKIE['usuario']);
				die();	


				if ($objeto->contraseña == $claveIngresada)
				{
					fclose($archivo);
					$_SESSION['usuario']=$usuarioIngresado;
					//var_dump($_SESSION['usuario']);
					//die();

					$_SESSION['perfil']=$claveIngresada;

					

					header("Location: ../paginas/login.php");
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) {
			header("Location: ../paginas/login.php?error=usuarioincorrecto");
			fclose($archivo);
			exit();
		}
		else 
	    {
			header("Location: ../paginas/login.php?error=contraseñaincorrecta");
			fclose($archivo);
			exit();
		}

		fclose($archivo);
	}	
	header("Location: ../paginas/login.php");
	exit();
?>