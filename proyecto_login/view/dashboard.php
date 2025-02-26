<!DOCTYPE html>
<html lang="en">
<?php include_once '../controller/controller_dashboard.php'; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Bienvenido,<?php echo ($datos_usuario['usuario']); ?>!</h2> 
    
    <h3>Datos del Usuario</h3>
    <table  class="container"> <!-- clase para los estilos-->
        <tr>
            <th>Nombre</th>
            <td><?php echo $usuario['usuario']; ?></td> <!--Array asociativo de $usuario -->
        </tr>
        <tr>
            <th>Correo</th>
            <td><?php echo $usuario['correo']; ?></td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td><?php echo $usuario['telefono']; ?></td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td><?php echo $usuario['direccion']; ?></td>
        </tr>
        <tr>
            <th>Edad</th>
            <td><?php echo $usuario['edad']; ?></td>
        </tr>
    </table>

    <h4>Actualizar Información</h4>
    <form method="POST" action=""> 
        Nuevo correo: <input type="email" name="correo" value="<?php echo ($datos_usuario['correo']); ?>" required><br> <!--imprime el valor almacenado en el array asociativo y required hace que el campo sea obligatorio-->
        Nueva contraseña: <input type="password" name="contrasena"><br>
        <button type="submit" name="actualizar">Actualizar</button>
    </form><br>

    <form method="POST" action="">
        <button type="submit" name="borrar">Eliminar Cuenta</button>
    </form><br>
    <a href="logout.php">Cerrar Sesión</a> 
</body>
</html>