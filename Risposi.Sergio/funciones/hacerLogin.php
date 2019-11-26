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
		$consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");
		$consulta->execute();			
		$datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
		//while(!feof($archivo)) 

		foreach ($datos as $usuario) 
		{

			if ($usuario["nombre"] == $usuarioIngresado) 
			{	
				$booUsuario = 1;	
				if($usuario['estado']=="Deshabilitado")
				{
					header("Location: ../paginas/login.php?error=usuariodenegado");
					exit();
				}
				elseif ($usuario["clave"] == $claveIngresada)
				{
					$booUsuario = 2;			
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
		if ($booUsuario == 1)		 
	    {
			header("Location: ../paginas/login.php?error=contrasenaincorrecta");

			exit();
		}


	}	
	header("Location: ../paginas/login.php");
	exit();
?>