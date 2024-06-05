<?php
session_start();

$email_actual = $_POST["email_actual"];
$nuevo_usuario = $_POST["nuevo_usuario"];
$nueva_contraseña = $_POST["nueva_contraseña"];

if (isset($email_actual) && !empty($email_actual) && isset($nuevo_usuario) && !empty($nuevo_usuario) && isset($nueva_contraseña) && !empty($nueva_contraseña)) {
    
    $conexion = new mysqli("localhost", "id22240670_galeria", "!1234abcD", "id22240670_galeria");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Actualizar los datos del usuario hola
    
    $consulta_actualizar = "UPDATE usuarios SET nombre_usuario='$nuevo_usuario', contraseña='$nueva_contraseña' WHERE email='$email_actual'";

    if ($conexion->query($consulta_actualizar) === TRUE) {
        echo "<script>
                alert('Datos actualizados exitosamente. Por favor, inicie sesión con sus nuevos datos.');
                window.location.href='login.php';
              </script>";
    } else {
        echo "Error al actualizar datos: " . $conexion->error;
    }

    $conexion->close();
} else {
    echo "Error: Todos los campos son obligatorios.";
}
?>
