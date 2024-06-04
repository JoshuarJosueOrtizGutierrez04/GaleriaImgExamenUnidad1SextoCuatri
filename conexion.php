<?php
$servidor = "localhost";
$usuario = "id22240670_galeria";
$contrasena = "!1234abcD";
$base_datos = "id22240670_galeria";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
