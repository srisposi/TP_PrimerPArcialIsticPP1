<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="mario.ico">

    <title>Sticky Footer Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Sergio Risposi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Registro.php">Registro <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="Patente.php">Patente</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="Facturar.php">Facturar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="Factudos.php">Facturados</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
    <h1>Facturados</h1>
    <ol>
      <?php
      $archivo = fopen("facturados.txt","r");
      while(!feof($archivo))
      {
        $obejto=json_decode(fgets($archivo));
        if(isset($objeto))
        {  
     
          echo "<li>";
          echo "Patente: ",$objeto->patenteFacturada; 
          echo"</li>";

          echo "<li>";
          echo "FechaAlta: ",$objeto->fechaEntrada; 
          echo"</li>";
          
          echo "<li>";
          echo "FechaBaja: ",$objeto->fechaSalida; 
          echo"</li>";

          echo "<li>";
          echo "Pago: ",$objeto->importe; 
          echo"</li>";

          /*echo "<li>FechaAlta" . "......." . $objeto->fechaEntrada 
          "</li>";
          echo "<li>FechaSalida" . "......." . $objeto->fechaSalida "</li>";
          echo "<li>Pago" ."......." .$objeto->importe"</li>";*/
       
        }
        else
         {
          continue;
         } 
      } 
      fclose($archivo);

      ?>
    </ol>  
    </main>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
  </body>
</html>
