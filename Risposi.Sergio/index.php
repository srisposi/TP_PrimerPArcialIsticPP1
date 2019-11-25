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
    <link rel="icon" href="favicon/mario.ico">

    <title>Estacionamiento Mario</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">

    <link href="css/imagen.css">


  </head>

    <header>
    <?php
        include "componentes/menu.php";
    ?>
    </header>
    <body>
        <main role="main" class="container">    
            <section>
                <article>            
                <h1 class="mt-5">Estacionamiento Mario</h1>
                <p class="lead">Bienvenido al Estacionamiento de Risposi Sergio!!!</p>
                </article>
                <nav>
                    <img class="foto1" src="https://files.merca20.com/uploads/2018/03/Super-Mario-Nintendo-Bigstock.jpg">
                </nav>

            </section>    
        </main>
    </body>        
    <footer class="footer">
    <?php
        include "componentes/pie.php";
    ?>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" cAlumnorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>
