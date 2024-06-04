<?php
session_start();

// Datos del formulario de inicio de sesión
$usuario = $_POST["user"];
$contraseña = $_POST["pass"];
$email = $_POST["email"];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "id22240670_galeria", "!1234abcD", "id22240670_galeria");


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


$consulta = "SELECT nombre_usuario FROM usuarios WHERE nombre_usuario = ? AND contraseña = ?";
$stmt = $conexion->prepare($consulta);
$stmt->bind_param("ss", $usuario, $contraseña);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $_SESSION["usuario"] = $usuario;
    $_SESSION['mensaje'] = 'Inicio de sesión exitoso. ¡Bienvenido!';
    header("Location: inicio.php");
    exit;
} else {
    $_SESSION['mensaje'] = 'Usuario o contraseña incorrectos.';
    header("Location: login.php");
    exit;
}

$conexion->close();
?>
