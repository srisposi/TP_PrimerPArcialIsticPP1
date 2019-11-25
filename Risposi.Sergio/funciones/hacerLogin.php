<?php
	session_start();
	include 'AccesoDatos.php';
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
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("select nombre  , clave  from usuario");
		$consulta->execute();			
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
		//while(!feof($archivo)) 
		foreach ($datos as $usuario) 
		{

			if ($usuario["nombre"] == $usuarioIngresado) 
			{	

	
				$booUsuario = 1;
				if ($usuario["clave"] == $claveIngresada)
				{
					$booPassword = 1;
			
					$_SESSION['usuario']=$usuarioIngresado;

					setcookie("usuario", $usuarioIngresado);				
					$_COOKIE['usuario']=$_SESSION['usuario'];

					$_SESSION['perfil']=$claveIngresada;
					header("Location: ../paginas/login.php");
					exit();
				}			
			}
		 	
		}	
		if ($booUsuario == 0) {
			header("Location: ../paginas/login.php?error=usuarioincorrecto");

			exit();
		}
		else 
	    {
			header("Location: ../paginas/login.php?error=contraseñaincorrecta");

			exit();
		}


	}	
	header("Location: ../paginas/login.php");
	exit();
?>