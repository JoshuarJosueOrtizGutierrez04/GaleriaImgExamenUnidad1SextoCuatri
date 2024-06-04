<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["user"];
    $contraseña = $_POST["pass"];
    $email = $_POST["email"];

    // guarda datos
    if (empty($usuario) || empty($contraseña) || empty($email)) {
        die("Todos los campos son obligatorios.");
    }

    // mi conexion de base de datos
    $conexion = new mysqli("localhost", "id22240670_galeria", "!1234abcD", "id22240670_galeria");

   
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }


    $consulta = "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "El usuario ya existe.";
    } else {
        
        // Insertar nuevo usuario
        $consulta_registro = "INSERT INTO usuarios (nombre_usuario, contraseña, email) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($consulta_registro);
        $stmt->bind_param("sss", $usuario, $contraseña, $email);

        if ($stmt->execute()) {
            // Redirige al login
            header("Location: login.php?mensaje=registro_exitoso");
            exit;
        } else {
            echo "Error al registrar el usuario: " . $conexion->error;
        }
    }

    $stmt->close();
    $conexion->close();
}
?>
