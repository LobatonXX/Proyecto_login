<?php
session_start(); // Inicia la sesión para almacenar datos
include 'conectionDB.php';
/*REGISTRO*/
if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si el formulario fue enviado con el método POST 
    $usuario = $_POST['usuario'];      // Captura los datos del formulario en variables
    $correo = $_POST['correo'];    
    $telefono = $_POST['telefono']; 
    $direccion = $_POST['direccion']; 
    $edad = $_POST['edad']; 

    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);    // Encripta la contraseña antes de almacenarla en la base de datos

    /*VERIFICACION DEL CORREO y USUARIO */
    $sql = "SELECT usuario, correo FROM usuarios WHERE usuario = '$usuario'";// Consulta para obtener los datos del usuario que ha iniciado sesión
    $resultado = $conn->query($sql); // Ejecuta la consulta en la base de datos

        if ($resultado->num_rows > 0) {// Verifica si el usuario existe
            echo "⚠️ Error: Este correo ya está registrado. Intenta con otro.";
        }else{
            $sql_usuario = "INSERT INTO usuarios (usuario, correo, contrasena) VALUES ('$usuario', '$correo', '$contrasena')"; // realiza la consulta para insertar datos en la tabla de usuarios
            if ($conn->query($sql_usuario) === TRUE) {// si se ejecuta la consulta en la base de datos
            
                $id_usuario = $conn->insert_id;//se utiliza para obtener el ID autoincremental del último registro insertado en la base de datos.
        
                $sql_contacto = "INSERT INTO contacto (telefono, direccion, edad,id_usuario ) VALUES ('$telefono', '$direccion', '$edad','$id_usuario' )";// realiza la consulta para insertar datos en la tabla de contacto incluyendo la clave foranea
        
                if ($conn->query($sql_contacto) === TRUE) {// si se ejecuta la consulta en la base de datos muestra un mensaje y hipervinculo para ir a el login
                    echo "Usuario registrado exitosamente. <a href='login.php'>Iniciar sesión</a>";
                } else {
                    echo "Error al insertar en contacto: " ;
                }
            } else {
                echo "Error al registrar usuario: " ;
            }
        }
        
}
?>
