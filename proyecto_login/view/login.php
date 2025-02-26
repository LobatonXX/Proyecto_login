<!DOCTYPE html>
<html lang="en">
<?php include_once '../controller/controller_login.php'; ?>

<head>
    <meta charset="UTF-8"><!-- Configuración de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="styles.css"> <!--  indica que el archivo enlazado es una hoja de estilos -->
</head>
<body>
    <h2>Iniciar Sesión</h2><br>
    <form action="login.php" method="POST"> <!-- POST se usa para enviar datos de manera segura, ya que no se muestran en la URL (a diferencia de GET).La propiedad method indica como se organizan esos datos para enviarlos al servidor, -->
      
        <label>Usuario:</label><br>
        <input type="text" name ="usuario" required><br> <!--campo obligatorio -->

        <label>Contraseña:</label><br>
        <input type="password" name ="contrasena" required><br><!--campo obligatorio -->

        <button type="submit">Iniciar Sesión </button> <br>
    </form>
    <p>¿No tienes cuenta? <a href="registrer.php">Regristrarte</a><p>  <!--redirige a la pagina de registro -->
</body>
</html>