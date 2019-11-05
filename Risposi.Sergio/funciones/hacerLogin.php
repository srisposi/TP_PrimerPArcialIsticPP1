<?php
	session_start();
//var_dump($_GET['inputEmail']);
//var_dump($_GET['inputPassword']);
//die();
	$usuarioIngresado = $_GET['inputEmail'];
	$claveIngresada = $_GET['inputPassword'];
	setcookie("usuario", $usuarioIngresado);
die();
	$booUsuario = 0;
	$booPassword = 0;

	if (empty($usuarioIngresado) || empty($claveIngresada)) 
	{
		header("Location: ../paginas/login.php?error=camposvacios");
		exit();
	}
	else
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select nombre  , clave  from usuario");
		$consulta->execute();			
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);







		//$archivo = fopen("../usuario/usuario.txt", "r") or die("Imposible arbrir el archivo");
	
		//while(!feof($archivo)) 
		foreach ($datos as $usuario) 
		


		{
			//$objeto = json_decode(fgets($archivo));
			

			//var_dump($objeto->nombre);	
			//var_dump($objeto->contraseña);
			//die();
			if ($objeto->nombre == $usuarioIngresado) 
			{	
				$booUsuario = 1;
				
				
				
				//var_dump($_COOKIE['usuario']);
				//die();	


				if ($objeto->contraseña == $claveIngresada)
				{
					//fclose($archivo);
					
					$_SESSION['usuario']=$usuarioIngresado;
					//var_dump($_SESSION['usuario']);
					//die();

					$_SESSION['perfil']=$claveIngresada;

					//setcookie("usuario", $_SESSION['usuario'], expires_or_options, path, domain, secure, httponly);
					header("Location: ../paginas/login.php");
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) {
			header("Location: ../paginas/login.php?error=usuarioincorrecto");
			//fclose($archivo);
			exit();
		}
		else 
	    {
			header("Location: ../paginas/login.php?error=contraseñaincorrecta");
			//fclose($archivo);
			exit();
		}

		//fclose($archivo);
	}	
	header("Location: ../paginas/login.php");
	exit();
?>