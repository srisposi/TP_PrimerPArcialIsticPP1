<?php 
    if(isset($_SESSION['usuario'])){
    //solo muestra el menu si estas con la variable de sesión instaciada
?>

<div class="container">
    <span class="text-muted">Bienvenido   <?php echo $_SESSION['usuario'];?>   </span>  <span class="text-muted">otro datos como fecha y hora de ingreso se pueden ver aqui</span>
</div>

<?php 
    }
    else
    {
?>
<div class="container">
        <span class="text-muted">Yo soy el footer, dónde podrá ver otros datos relevantes</span>  
</div>
<?php 
}
?>