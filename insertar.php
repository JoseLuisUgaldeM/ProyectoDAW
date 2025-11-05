<?php
require("conexion.php");
// Recoger los datos del formulario de forma segura
$nombre = $_POST['nombre'];
$primerApellido=$_POST['primerApellido'];
$segundoApellido=$_POST['segundoApellido'];
$usuarioNombre=$_POST['usuarioNombre'];
$pass=$_POST['pass'];
$email = $_POST['email'];

// Preparar e insertar datos usando sentencias preparadas
$insertar = "INSERT INTO usuario (nombre, primerApellido, segundoApellido, usuarioNombre, pass) VALUES(
    '$nombre', 
    '$primerApellido', 
    '$segundoApellido',
    '$usuarioNombre',
    '$pass'
    )";

$query = mysqli_query($conexion, $insertar);

// Cerrar la sentencia y la conexión

$conexion->close();
header("Location:index.php");
?>