<!DOCTYPE html>
<html lang="en">
<?php include_once '../controller/controller_registrer.php'; ?>
<head>
    <meta charset="UTF-8"><!-- Configuración de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Registro</h2> 
    <form action="registrer.php" method="POST">
        <label>Nombre de Usuario:</label><br>
        <input type="text" name ="usuario" required><br> <!--campo obligatorio -->

        <label>Correo Electronico:</label><br>
        <input type="email" name ="correo" required><br><!--campo obligatorio -->

        <label>Contraseña:</label><br>
        <input type="password" name ="contrasena" required><br><!--campo obligatorio -->
        
        <label> Telefono:</label><br>
        <input type="text" value="55-" name="telefono" size="5"><br>

        <label> Direccion:</label><br>
        <input type="text"  name="direccion" ><br>

        <label> Edad:</label><br>
        <input type="number"  name="edad" ><br>


        <button type="submit">Registrarse</button>
    </form>

    <P>¿Ya tienes cuenta? <a href="login.php">Iniciar Sesión</a><p> <!--redirige a la pagina de login -->
</body>
</html>