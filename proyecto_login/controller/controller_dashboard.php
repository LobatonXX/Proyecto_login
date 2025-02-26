<?php
session_start(); // Inicia la sesión para almacenar datos 

include 'conectionDB.php'; // Conecta a la base de datos

if (!isset($_SESSION['usuario'])) { // Verifica si el usuario ha iniciado sesión
    header("Location: login.php"); // Si no ha iniciado sesion lo redirige a la página de inicio de sesión.
    exit(); 
}

    $usuario = $_SESSION['usuario'];// Obtiene el nombre de usuario almacenado en la sesión
    $sql = "SELECT usuario, correo FROM usuarios WHERE usuario = '$usuario'";// Consulta para obtener los datos del usuario que ha iniciado sesión
    $resultado = $conn->query($sql); // Ejecuta la consulta en la base de datos
    if ($resultado->num_rows > 0) {// Verifica si el usuario existe
        $datos_usuario = $resultado->fetch_assoc(); // Convierte el resultado de la consulta en un array asociativo
    }


// * ACTUALIZAR *
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['actualizar'])) { // Verifica si el formulario fue enviado con el método POST y si el botón 'actualizar' fue presionado con isset
        $nuevo_correo = isset($_POST['correo']); //Filtra la dirección de correo electrónico.	
        $nueva_contrasena = isset($_POST['contrasena']) ? password_hash($_POST['contrasena'], PASSWORD_DEFAULT) : $datos_usuario['contrasena'];// Encripta la contraseña antes de almacenarla en la base de datos
        $sql_actualizar = "UPDATE usuarios SET correo = '$nuevo_correo', contrasena = '$nueva_contrasena' WHERE usuario = '$usuario'";// Consulta para actualizar el correo y la contraseña 

        if ($conn->query($sql_actualizar) === TRUE) { // si realiza la consulta en la base de datos mostrara un mensaje y actualizara el correo en la variable para mostrarlo
            echo "<p style='color:green;'>Datos actualizados correctamente.</p>"; 
            $datos_usuario['correo'] = $nuevo_correo; 
        } else {//si no mostrara un error
            echo "<p style='color:red;'>Error al actualizar.</p>"; 
        }
    }


// * ELIMINAR CUENTA DEL USUARIO *
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['borrar'])) {// Verifica si el formulario fue enviado con el método POST y si el botón 'borrar' fue presionado con isset
        $sql_borrar = "DELETE FROM usuarios WHERE usuario = '$usuario'";// Consulta para borrar al usuario 

        if ($conn->query($sql_borrar) === TRUE) {// si realiza la consulta en la base de datos se destruyen todos los datos registrados en la sesión
            session_destroy();
            header("Location: registrer.php"); // Redirige a la página de registro 
            exit(); 
        }
    }



//*DATOS DEL USUARIO *
    $id_usuario = $_SESSION['id_usuario'];// Obtiene el id de usuario almacenado en la sesión

        $sql_datos = "SELECT usuarios.usuario, usuarios.correo, contacto.telefono, contacto.direccion, contacto.edad 
                      FROM usuarios 
                      INNER JOIN contacto ON usuarios.id_usuario = contacto.id_usuario
                      WHERE usuarios.id_usuario = $id_usuario";// Consulta para obtener los datos de la tabla usuarios y de la tabla contacto
        $result = $conn->query($sql_datos); // Ejecuta la consulta en la base de datos
        $usuario = $result->fetch_assoc(); // Convierte el resultado de la consulta en un array asociativo $usuario 
?>