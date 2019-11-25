<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="#">Sergio Risposi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-iconx|"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/Risposi.Sergio/index.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <?php 
        if(isset($_SESSION['usuario'])==false)
        {
        //solo muestra estos item , si el usuario no esta logeado
        ?>
        <li class="nav-item">
          <a class="nav-link" href="/Risposi.Sergio/paginas/registro.php">Registrate</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="/Risposi.Sergio/paginas/login.php">Login</a>
        </li>
        <?php 
        }
        ?>
        <?php 
          if(isset($_SESSION['usuario']))
          {
        ?>
        <li class="nav-item">
          <a class="nav-link" href="/Risposi.Sergio/paginas/ingresarVehiculo.php">Ingresar Vehiculo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Risposi.Sergio/paginas/facturarVehiculo.php">Facturar Vehiculo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Risposi.Sergio/paginas/listarUsuario.php">Listar Usuarios</a>
            <li class="nav-item">
              <a class="nav-link" href="/Risposi.Sergio/paginas/listarVehiculo.php">Listar Vehiculos</a>
            </li>
          
            <?php 
            }
            ?>
             <?php 
            if(isset($_SESSION['usuario']) && ($_SESSION['perfilRegistrado']=="admin")){
              //solo muestra el menu si estas con la variable de sesión instaciada y sos de perfil admin
            ?>
           
            <li class="nav-item">
              <a class="nav-link" href="/Risposi.Sergio/paginas/historicoVehiculos.php">Historial Vehiculos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/Risposi.Sergio/paginas/historicoEmpleados.php">Historial Empleados</a>
            </li>

            <?php 
            }
            ?>
         
          </ul>
          <form class="form-inline mt-2 mt-md-0" action="/Risposi.Sergio/funciones/hacerLogout.php">
            <input class="form-control mr-sm-2" type="text" placeholder="Quien Soy" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Salir</button>
          </form>
        </div>
      </nav>
 