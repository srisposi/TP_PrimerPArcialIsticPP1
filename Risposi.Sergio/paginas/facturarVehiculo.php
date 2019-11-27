<?php
session_start();
include "../funciones/AccesoDatos.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon/mario.ico">

    <title>Facturación del Estacionamiento</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/sticky-footer-navbar.css" rel="stylesheet">
    
  </head>

  <body>

    <header>
    <?php
        include "../componentes/menu.php";
    ?>
    </header>

    <!-- Begin page content -->
    <section>
      <nav>
        <main role="main" class="container">
             
          <h1 class="mt-5">Estacionamiento ISTIC 2019</h1>
          <p class="lead">Facturación</p>


          <form class="form-signin" action="../funciones/hacerFacturar.php">
                                  
          <h1 class="h3 mb-3 font-weight-normal">Facturación</h1>

                        <?php 
            if (isset($_GET['exito']))
            {        
                echo '<p>Vehiculo facturado!</p>'; 
            }
            else if (isset($_GET['cobrar'])) 
            { 
              $aPagar = $_GET['cobrar'];
              $ingreso = $_GET['ingreso'];
              $salida = $_GET['salida'];
            ?>  


            <?php
              //$estadia = $_GET['estadia'];
              echo "<p>Fecha de ingreso: ".date("d-m-y H:i",$ingreso)."</p><br>";
              echo "<p>Fecha de salida: ".date("d-m-y H:i",$salida)."</p><br>";
              //echo "<p>Cantidad de horas de estadia: ".$estadia."</p><br>";
              echo "<p>Total a pagar: $".$aPagar."</p><br>";
            }
            else if (isset($_GET['error'])) 
            {
              echo '<p>No existe un vehiculo con esa patente!</p>';  
            }
            ?>        

            <input type="text" name="inputPatente" class="form-control" placeholder="patente" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Facturar</button> 

           </form>
         </main>   
        </nav>

        
          <article>
            

          <?php 

          $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
          $consulta =$objetoAccesoDato->RetornarConsulta("select * from factura");
          $consulta->execute();     
          $datos= $consulta->fetchAll(PDO::FETCH_ASSOC);
//var_dump($datos);
//die();

            ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Patente</th>
                  <th scope="col">Fecha de Ingreso</th>         
                </tr>
              </thead>

        <?php

          foreach ($datos as $factura) 
            {?>

             
              <tbody>
                <tr>

                  <td><?php echo $factura['patente'];?></td>
                  <td><?php echo $factura["fechaIngreso"];?></td>
                </tr>
            <?php
            }
            ?>  

        </tbody>
     </table>


    </article>    

  </section>             




      
     <footer class="footer">
    <?php
        include "../componentes/pie.php";
    ?>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" cAlumnorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
