



<?php 
                  if(isset($_SESSION['usuario'])){
                    //solo muestra el menu si estas con la variable de sesión instaciada
?>

<div class="container">
        <span class="text-muted">Bienvenido   <?php echo $_SESSION['usuario'];?>   </span>  <span class="text-muted">otro datos como fecha y hora de ingreso, total de autos estacionados, datos que todo el tiempo deben estar en pantalla</span>
</div>

<?php 
                 }
                  else
                  {
?>



<div class="container">
        <span class="text-muted">Yo soy el footer, dónde podrá ver los datos relevantes</span>  
</div>


<?php 
}
?>