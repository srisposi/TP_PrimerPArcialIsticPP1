<?php  
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../favicon/mario.ico">
    <title>Lista de Usuarios</title>
     <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/floating-labels.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <?php  
        include "../componentes/menu.php";
      ?>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
      <?php 
      if (isset($_SESSION['usuario'])) 
      {
        ?>      
    	<div>
      	<h2>Listado de usuarios</h2>
      	<ol>
			<?php
      error_reporting(0);
			$archivo = fopen("../usuario/usuario.txt", "r") or die("Imposible abrir el archivo");
			while(!feof($archivo)) 
			{
		 		$objeto = json_decode(fgets($archivo));
        if (!$objeto == "") {
          echo "<li>Usuario: ".$objeto->nombre."</li>";
        }
			}
			fclose($archivo);
			?>
		</ol>
		</div>
    <?php 
     }
     ?>
 	</main>
    <footer class="footer">
      <?php  
        include "../componentes/pie.php";
      ?>
    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>