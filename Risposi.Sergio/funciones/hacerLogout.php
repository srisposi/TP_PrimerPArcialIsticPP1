<?php
	session_start();
$_SESSION=null;
session_destroy();
header("Location: /Risposi.Sergio/funciones/index.php");
?>