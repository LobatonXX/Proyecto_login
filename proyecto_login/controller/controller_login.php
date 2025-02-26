<?php
session_start(); // Inicia la sesión para almacenar datos

include 'conectionDB.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si el formulario fue enviado con el método POST , $_SERVER es una matriz que contiene información sobre el servidor y el entorno de ejecución. 

    $usuario = trim($_POST['usuario']);     // Obtiene los valores ingresados en los campos del formulario y elimina espacios innecesarios con trim()
    $contrasena = trim($_POST['contrasena']); 

        if (!empty($usuario) && !empty($contrasena)) { // Verifica que los campos no estén vacíos usando !empty()
            $sql = "SELECT id_usuario, usuario, contrasena FROM usuarios WHERE usuario = '$usuario'";  // Consulta SQL para obtener los datos del usuario que coincidan con el nombre ingresado
            $result = $conn->query($sql); // Ejecuta la consulta en la base de datos
            $usuario = $result->fetch_assoc(); // Convierte el resultado de la consulta en un array asociativo con los datos del usuario

                if (password_verify($contrasena, $usuario['contrasena'])) {// Verifica si la contraseña ingresada coincide con la contraseña encriptada almacenada en la base de datos

                    $_SESSION['id_usuario'] = $usuario['id_usuario'];//el vector asociativo $_SESSION que almacena las variables de sesión.
                    $_SESSION['usuario'] = $usuario['usuario']; // Guarda en la sesión el ID y el nombre del usuario para mantener la sesión iniciada

                    header("Location: ../view/dashboard.php");// si coincide lo redirige al usuario al dashboard 
                    exit(); 
                } else {
                    $error = "Contraseña incorrecta."; //si no manda un mensaje de error 
                    }
        } else {
            $error = "El usuario no existe.";  //si no manda un mensaje de error 
            }
} else {
        $error = "Todos los campos son obligatorios.";  //si no manda un mensaje de error 
    }

?>
