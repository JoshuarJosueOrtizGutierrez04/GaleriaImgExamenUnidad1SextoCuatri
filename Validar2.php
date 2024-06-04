<?php
session_start();

// Obtener datos del formulario
$usuario = $_POST["user"];
$contraseña = $_POST["pass"];
$email = $_POST["email"];


if(isset($usuario) && !empty($usuario)) {
    
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "id22240670_galeria", "!1234abcD", "id22240670_galeria");

  
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

   
    $consulta_actualizar = "UPDATE usuarios SET contraseña='$contraseña', email='$email' WHERE nombre_usuario='$usuario'";

    if ($conexion->query($consulta_actualizar) === TRUE) {
        echo "Datos actualizados exitosamente";
    } else {
        echo "Error al actualizar datos: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Error: No se recibió el nombre de usuario correctamente.";
}
?>
