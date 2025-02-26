<?php
session_start();//recuperará cualquier dato de la sesión existente 
session_destroy();//Destruye todos los datos registrados en la sesión
header("Location: login.php"); //redirige a la pagina de login
exit();
?>
