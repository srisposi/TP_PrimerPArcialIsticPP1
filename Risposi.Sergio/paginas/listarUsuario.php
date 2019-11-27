<?php  
include '../funciones/AccesoDatos.php';
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../favicon/mario.ico">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  
    <header>
      <?php  
        include "../componentes/menu.php";
      ?>
    </header>
    <body>
    <!-- Begin page content -->
    <main role="main" class="container">
      <?php 
      if (isset($_SESSION['usuario'])) 
      {
        ?>      
    	
        <div class="row justify-content-center">
          <div class="col-sm-8 bg-row pl-5 pr-5 pt-4 pb-5">
             <form action="../funciones/modificoUsuario.php" method="post" accept-charset="utf-8">
              <h2 class="h3 mb-5 text-center font-weight-normal">Listado de usuarios</h2>
      	
        			<?php
              echo "<table border='2'>";
              echo "<tr>";
              echo "<th>codigoID</th>";
              echo "<th>Nombre</th>";
              echo "<th>perfil</th>";
              echo "<th>Estado</th>";
              echo "</tr>"; 

              $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();    
              $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario");  
              $consulta->execute();         
              $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
         
              foreach ($datos as $usuario){ 
                echo "<tr>";
                echo "<td>";
                echo $usuario['id'];
                echo "</td>";
                echo "<td>";        
                echo $usuario['nombre'];
                echo "</td>";
                echo "<td>";        
                echo $usuario['perfil'];
                echo "</td>";
                echo "<td>";
                if ($usuario['estado'] == 'Deshabilitado') 
                  {
                    echo "<button type='submit' name='habilitar' value='".$usuario['nombre']."' class='btn btn-success'>Habilitar</button>";
                  }
                  else
                  {                    
                    echo "<button type='submit' name='deshabilitar' value='".$usuario['nombre']."' class='btn btn-danger'>Deshabilitar</button>";
                  }                   
                //echo("<a href='../TALLER/Edito.php?ID=".$fila['nro de orden']."'><img src='habilitar.png'></a>");
                echo "</td>";
                echo "<tr>";
              }
              echo "</table>";
        			?>
		
		        </form>
          </div>
        </div>
        <?php 
        }
        ?>

        <?php 
          if (isset($_GET['exito'])) 
          {
            if($_GET['actualizar']=="exito1")
            {

              echo '<p>Habilitado con éxito!</p>';
            }
            else
            {
              echo '<p>Deshabilitado con éxito!</p>';             
            }  
          }          

        ?>
        <form action="../funciones/hacerCSV.php" class="form-signin">
        <button class="btn btn-lg btn-danger btn-block" type="submit">Obtener CSV</button>

        <?php if(isset($_GET['exitoCSV'])&&$_GET['exitoCSV']=="exitoCSV")
        {
          echo "Archivo CSV generado";
        }
        else
        {
          echo "Archivo CSV NO generado";
        }

        ?>

      </form>
 	    </main>
    </body>
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
</html>