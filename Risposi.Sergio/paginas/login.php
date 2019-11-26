<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon/mario.ico">

    <title>Estacionamiento Risposi Sergio</title>

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
         
      <h1 class="mt-5">Estacionamiento ISTIC 2019</h1>
      <p class="lead">Bienvenido a Estacionamientos Risposi Sergio!!!</p>


      <form class="form-signin" action="../funciones/hacerLogin.php">
                              
      <h1 class="h3 mb-3 font-weight-normal">Ingrese sus datos</h1>

           <?php  
          // var_dump($_COOKIE['usuario']);
           //die();
            //var_dump($_GET['error']);
            //die();
           if(isset($_GET['error']))
           {
              switch($_GET['error'])
              {
                case "usuariodenegado":
                  echo ('<p>No estas habilitado a entrar.</p>');
                  break;
                case "contrasenaincorrecta":
                  echo ('<p>La contraseña es incorrecta.</p>');
                  break;
                case "usuarioincorrecto":
                  echo ('<p>El usuario no existe.</p>');
                  break;
                
              }
            } 
            elseif (isset($_SESSION['usuario'])) 
              {
                echo ('<p>Bienvenido!</p>');
              }         
            else 
              {
                echo("Usted no se encuentra registrado");
              }             
            ?>
            <label for="inputEmail" class="sr-only">Usuario</label>
           
            <input type="text" id="inputEmail" name="inputEmail" class="form-control" placeholder="<?php 
            if (isset($_COOKIE['usuario'])) 
                    { 
                      echo ($_COOKIE['usuario']);
                     }
                      ;?>" required autofocus>


            <label for="inputPassword" class="sr-only">Clave</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="la clave secreta" required>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Recordarme
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
            </form>
                            




    </main>
      
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
