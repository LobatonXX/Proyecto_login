<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bd_login";
$conn = new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
    die("error en la conexion:". $conn->connect_error);
}
?>
 <!--CREATE DATABASE bd_login;
USE bd_login;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY, 
    usuario VARCHAR(100) NOT NULL, 
    correo VARCHAR(100) NOT NULL UNIQUE,
    contrasena VARCHAR(255) NOT NULL 
);


CREATE TABLE contacto (
    id_contacto INT AUTO_INCREMENT PRIMARY KEY, 
    telefono VARCHAR(20) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    edad INT NOT NULL,
    id_usuario INT NOT NULL, 
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE 
);-->
